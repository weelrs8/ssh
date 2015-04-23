<?php

namespace SSH;

class SSHConnection
{
    private $resource;

    public function open($hostname, $port = 22)
    {
        $this->resource = ssh2_connect($hostname, $port);

        if (!is_resource($this->resource))
            throw new \Exception("Não foi possível estabelecer a conexão!");
    }

    public function authenticate(SSHAuthentication $auth)
    {
        $auth->authenticate($this->resource);
    }

    public function run($cmd)
    {
        $stream = ssh2_exec($this->resource, $cmd);

        stream_set_blocking($stream, true);

        return stream_get_contents($stream);
    }
}