<?php

class User
{
    private string $login;
    private string $password;
    private string $token;

    public function __construct($login, $password="", $token=""){
        $this->login=$login;
        $this->password=$password;
        $this->token=$token;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    /**
     * @return mixed|string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed|string $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed|string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed|string $token
     */
    public function setToken($token): void
    {
        $this->token = $token;
    }
}