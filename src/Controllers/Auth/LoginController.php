<?php

namespace Pqe\Admin\Controllers\Auth;

use Pqe\Admin\Controllers\Controller;
use Adldap\Laravel\Facades\Adldap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Pqe\Admin\Models\AuditLog;

class LoginController extends Controller {
    /*
     * |--------------------------------------------------------------------------
     * | Login Controller
     * |--------------------------------------------------------------------------
     * |
     * | This controller handles authenticating users for the application and
     * | redirecting them to your home screen. The controller uses a trait
     * | to conveniently provide its functionality to your applications.
     * |
     * |Note : In this application we used two separate gaurds for authentication.For the administrator user used the ldap driver. For the normal users, used an eloquent driver. For both of these drivers we are using the same User model.
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
//         $this->middleware('web');
    }

    public function showLoginForm() {
        return view('pqeAdmin::auth.login');
    }

    public function username() {
        return 'username';
    }

    protected function validateLogin(Request $request) {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string'
        ]);
    }

    protected function attemptLogin(Request $request) {
        $credentials = $request->only($this->username(), 'password');

        $username = $credentials[$this->username()];
        $password = $credentials['password'];
        // TODO
        // gestire isadmin dell'utente ....

        $user = \Pqe\Admin\Models\User::where('username', $username)->first();

        if (!$user) {
            // the user doesn't exist in the local database, so we have to create one
            return false;
        }

        AuditLog::create(
                [
                    'code' => strtoupper($username),
                    // . $password . " " . password_hash($password, PASSWORD_DEFAULT),
                    'description' => "accessed",
                    'subject_id' => $user->id ?? null,
                    'subject_type' => "Pqe\Admin\Models\Users",
                    'user_name' => strtoupper($username) ?? null,
                    'user_id' => $user->id ?? null,
                    'properties' => $user ?? null,
                    'host' => request()->ip() ?? null,
                ]);

        if (!$user['external_auth']) {
            // Normal authentication for users
            // if("hr-admin" == mb_strtolower($request->username,'UTF-8')){
            // Check the input user credentials with our admin record in users table
            if (Auth::guard('admin')->attempt([
                'username' => $request->username,
                'password' => $request->password
            ], $request->remember)) {
                // Input users credentials are correct, so we can fetch the admin details and login to application.
                $this->guard()->login($user, true);
                return true;
            } else {
                // Input users credentials are not matched with the admin records present in users table
                if (Auth::guard('users')->attempt([
                    'username' => $request->username,
                    'password' => $request->password
                ], $request->remember)) {
                    // Input users credentials are correct, so we can fetch the admin details and login to application.
                    $this->guard()->login($user, true);
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            // LDAP auth
            // if (Adldap::auth()->attempt($username, $password, $bindAsUser = true)) {
            if (Adldap::auth()->attempt($username, $password, true)) {
                $this->guard()->login($user, true);
                return true;
            } else {
                // Input users credentials are not matched with the admin records present in users table
                return false;
            }
        }

        // the user doesn't exist in the LDAP server or the password is wrong
        // log error
        return false;
    }

    protected function retrieveSyncAttributes($username) {
        $ldapuser = Adldap::search()->findBy('samaccountname', $username); // userprincipalname or samaccountname
        if (!$ldapuser) {
            // log error
            return false;
        }
        // if you want to see the list of available attributes in your specific LDAP server:
        // var_dump($ldapuser->attributes); exit;
        // needed if any attribute is not directly accessible via a method call.
        // attributes in \Adldap\Models\User are protected, so we will need
        // to retrieve them using reflection.
        $ldapuser_attrs = null;

        $attrs = [];

        foreach (config('ldap_auth.sync_attributes') as $local_attr => $ldap_attr) {
            if ($local_attr == 'username') {
                continue;
            }

            $method = 'get' . $ldap_attr;
            if (method_exists($ldapuser, $method)) {
                $attrs[$local_attr] = $ldapuser->$method();
                continue;
            }

            if ($ldapuser_attrs === null) {
                $ldapuser_attrs = self::accessProtected($ldapuser, 'attributes');
            }

            if (!isset($ldapuser_attrs[$ldap_attr])) {
                // an exception could be thrown
                $attrs[$local_attr] = null;
                continue;
            }

            if (!is_array($ldapuser_attrs[$ldap_attr])) {
                $attrs[$local_attr] = $ldapuser_attrs[$ldap_attr];
            }

            if (count($ldapuser_attrs[$ldap_attr]) == 0) {
                // an exception could be thrown
                $attrs[$local_attr] = null;
                continue;
            }

            // now it returns the first item, but it could return
            // a comma-separated string or any other thing that suits you better
            $attrs[$local_attr] = $ldapuser_attrs[$ldap_attr][0];
            // $attrs[ $local_attr] = implode(',', $ldapuser_attrs[$ldap_attr]);
        }

        return $attrs;
    }

    protected static function accessProtected($obj, $prop) {
        $reflection = new \ReflectionClass($obj);
        $property = $reflection->getProperty($prop);
        $property->setAccessible(true);
        return $property->getValue($obj);
    }
}
