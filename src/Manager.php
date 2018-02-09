<?php

namespace Ykocaman\LdapAuth;

class Manager
{

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function connection($domain)
    {
        if ($this->isConfigured($domain) === false) {
            $domain = 'default';
        }

        if (empty($this->connections[$domain]) == true) {
            $this->connections[$domain] = $this->createConnection($domain);
        }

        return $this->connections[$domain];
    }

    protected function createConnection($name)
    {
        $config = $this->getConfig($name);

        $connection = new Ldap(new Connection($config));

        return $connection;
    }

    protected function getConfig($name)
    {
        if ($config = $this->isConfigured($name)) {
            return $config;
        }

        throw new \InvalidArgumentException("Ldap [$name] not configured.");
    }

    protected function isConfigured($name)
    {
        $connections = config('ldapauth.connections');

        if (is_null($config = array_get($connections, $name))) {
            return false;
        }

        return $config;
    }


}


