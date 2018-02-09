<?php

namespace Ykocaman\LdapAuth;

class Ldap
{

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function bind($dn, $password)
    {
        if (empty($dn) == true || empty($password) == true) return false;

        try {
            $result = ldap_bind($this->connection->getResource(), $dn, $password);
        } catch (\ErrorException $e) {
            $result = false;
        }

        $this->connection->bindAdmin();

        return $result;
    }

    public function getUserDetail($where, $value)
    {
        $person = ldap_search($this->connection->getResource(), $this->connection->getConfig('base_dn'), '(|(' . $where . '=' . $value . '))');

        $result = ldap_get_entries($this->connection->getResource(), $person);

        if (1 == $result['count']) {
            return $result[0];
        }

        return null;
    }

}
