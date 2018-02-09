<?php

namespace Ykocaman\LdapAuth;

class Connection
{
    private $config;
    private $connection;
    private $binded;

    public function __construct($config)
    {
        $this->config = $config;

        $this->connect();
        $this->bindAdmin();
    }

    public function connect()
    {
        if (is_null($this->connection) == false) return $this->connection;

        $this->connection = ldap_connect($this->config['server'], $this->config['port']);

        ldap_set_option($this->connection, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($this->connection, LDAP_OPT_REFERRALS, 0);
    }

    public function bindAdmin()
    {
        if (is_null($this->binded) == false) return $this->binded;

        $this->binded = ldap_bind($this->connection, $this->config['username'], $this->config['password']);

    }

    public function getResource()
    {
        return ($this->binded === true) ? $this->connection : false;
    }

    public function getConfig($option)
    {
        return array_get($this->config, $option);
    }
}
