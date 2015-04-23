SSH PHP
=======

Utilizando autenticação de usuário e senha
-------------------------------------------------------

    <?php
    use SSH\SSHConnection;
    use SSH\Auth\Password;

    $ssh = new SSHConnection();
    $ssh->open('172.17.10.180');
    $ssh->authenticate(new Password('username', 'password'));

Executando um comando
---------------------

    <?php

    $ssh->run('ls -la');