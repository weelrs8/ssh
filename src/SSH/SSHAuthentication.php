<?php

namespace SSH;

interface SSHAuthentication
{
    public function authenticate($resource);
}