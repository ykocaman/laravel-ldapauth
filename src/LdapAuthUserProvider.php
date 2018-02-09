<?php

namespace Ykocaman\LdapAuth;


use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class LdapAuthUserProvider extends EloquentUserProvider
{
    public function __construct($hasher, $model, $provider)
    {
        parent::__construct($hasher, $model);

        $this->provider = $provider;
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        if ($user->login_type != 'ldap') {
            return parent::validateCredentials($user, $credentials);
        }

        list($alias, $domain) = explode('@', $credentials['email']);

        $ldap = $this->provider->connection($domain);

        $ldapUser = $ldap->getUserDetail('mail', $credentials['email']);

        return $ldap->bind($ldapUser['dn'], $credentials['password']);
    }
}