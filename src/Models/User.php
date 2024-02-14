<?php

namespace Pqe\Admin\Models;

use Carbon\Carbon;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use LdapRecord\Laravel\Auth\AuthenticatesWithLdap;
use LdapRecord\Laravel\Auth\HasLdapUser;
use LdapRecord\Laravel\Auth\LdapAuthenticatable;
use DateTimeInterface;

class User extends Authenticatable implements LdapAuthenticatable {
    use Notifiable, AuthenticatesWithLdap, HasLdapUser, HasApiTokens;
    public $table = 'users';
    protected $hidden = [
        'remember_token',
        'password'
    ];
    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'username',
        'name',
        'status',
        'email',
        'is_admin',
        'external_auth',
        'email_verified_at',
        'password',
        'remember_token',
        'guid',
        'domain',
        'created_at',
        'updated_at',
    ];

    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }

    public function userUserAlerts() {
        return $this->belongsToMany(UserAlert::class);
    }

    public function getEmailVerifiedAtAttribute($value) {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(
                config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value) {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(
                config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input) {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sendPasswordResetNotification($token) {
        $this->notify(new ResetPassword($token));
    }

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function teams() {
        return $this->belongsToMany(Team::class);
    }

}
