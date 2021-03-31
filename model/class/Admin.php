<?php

class Admin
{
    private  $_mail;
    private  $_password;
    private  $_role = "administrateur";


    public function isAdmin(array $POST)
    {
        $mail = htmlspecialchars($POST['mail']);
        $password = htmlspecialchars($POST['password']);
        $conf_pass = htmlspecialchars($POST['conf_password']);
        $mail = strip_tags($mail);
        $password = strip_tags($password);
        $conf_pass = strip_tags($conf_pass);

        $sql = "SELECT * FROM admin WHERE login=$mail";
        $pdo = new PDO("mysql:dbname=boutique;host=localhost", 'root', '');
        $res = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->_role;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->_password;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->_password = $password;
    }

    /**
     * @param mixed $mail
     */
    public function setMail(mixed $mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @param string $role
     */
    public function setRole(string $role): void
    {
        $this->_role = $role;
    }

}


