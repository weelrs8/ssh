<?php

namespace SSH\Auth;

use SSH\SSHAuthentication;

class Password implements SSHAuthentication
{
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function authenticate($resource)
    {
        if (!is_resource($resource))
            throw new \Exception("Invalid SSH resource!");

        return ssh2_auth_password($resource, $this->username, $this->password);
    }
}