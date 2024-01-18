<?php

namespace Pqe\Admin\Controllers\Auth;

use Pqe\Admin\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Inertia\Inertia;
use Pqe\Admin\Models\AuditLog;
use Pqe\Admin\Providers\PqeAdminAppServiceProvider;
use Pqe\Admin\Requests\Auth\LoginRequest;

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
//     protected $redirectTo = PqeAdminAppServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
        // $this->middleware('web');
    }

    public function showLoginForm() {
        return view('pqeAdmin::auth.login');
    }

    /**
     * Show the login form.
     */
    public function showLoginFormInertia() {
        return Inertia::render('Auth/Login');
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

    public function login(LoginRequest $request) {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') && $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function attemptLogin(LoginRequest $request) {
        $credentials = $request->only($this->username(), 'password');

        $username = $credentials[$this->username()];
        // $password = $credentials['password'];
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
                if (Auth::guard('users')->attempt(
                        [
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
            // if (Adldap::auth()->attempt($username, $password, true)) {
            // $loginRequest = new LoginRequest();
            // $loginRequest = $request;
            $request->authenticate();

            $request->session()->regenerate();

            if (config('apipqe.inertia')) {
                return redirect()->intended(PqeAdminAppServiceProvider::HOME);
            } else {
                return redirect()->intended(PqeAdminAppServiceProvider::HOMEBLADE);
            }

            // $credentialsLdap = array(
            // 'samaccountname' => $username,
            // 'password' => $password,
            // );
            // if (Auth::attempt($credentialsLdap)) {
            // $this->guard()->login($user, true);
            // return true;
            // } else {
            // // Input users credentials are not matched with the admin records present in users table
            // return false;
            // }
        }

        // the user doesn't exist in the LDAP server or the password is wrong
        // log error
        return false;
    }

    // protected function retrieveSyncAttributes($username) {
    // $ldapuser = Adldap::search()->findBy('samaccountname', $username); // userprincipalname or samaccountname
    // if (!$ldapuser) {
    // // log error
    // return false;
    // }
    // // if you want to see the list of available attributes in your specific LDAP server:
    // // var_dump($ldapuser->attributes); exit;
    // // needed if any attribute is not directly accessible via a method call.
    // // attributes in \Adldap\Models\User are protected, so we will need
    // // to retrieve them using reflection.
    // $ldapuser_attrs = null;

    // $attrs = [];

    // foreach (config('ldap_auth.sync_attributes') as $local_attr => $ldap_attr) {
    // if ($local_attr == 'username') {
    // continue;
    // }

    // $method = 'get' . $ldap_attr;
    // if (method_exists($ldapuser, $method)) {
    // $attrs[$local_attr] = $ldapuser->$method();
    // continue;
    // }

    // if ($ldapuser_attrs === null) {
    // $ldapuser_attrs = self::accessProtected($ldapuser, 'attributes');
    // }

    // if (!isset($ldapuser_attrs[$ldap_attr])) {
    // // an exception could be thrown
    // $attrs[$local_attr] = null;
    // continue;
    // }

    // if (!is_array($ldapuser_attrs[$ldap_attr])) {
    // $attrs[$local_attr] = $ldapuser_attrs[$ldap_attr];
    // }

    // if (count($ldapuser_attrs[$ldap_attr]) == 0) {
    // // an exception could be thrown
    // $attrs[$local_attr] = null;
    // continue;
    // }

    // // now it returns the first item, but it could return
    // // a comma-separated string or any other thing that suits you better
    // $attrs[$local_attr] = $ldapuser_attrs[$ldap_attr][0];
    // // $attrs[ $local_attr] = implode(',', $ldapuser_attrs[$ldap_attr]);
    // }

    // return $attrs;
    // }

    // protected static function accessProtected($obj, $prop) {
    // $reflection = new ReflectionClass($obj);
    // $property = $reflection->getProperty($prop);
    // $property->setAccessible(true);
    // return $property->getValue($obj);
    // }
}
