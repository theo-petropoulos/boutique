<?php

//namespace App;
class Client extends User
{
    private string $_lastName;
    private string $_firstName;
    private string $_email;
    private string $_phone;
    private string $_adress;
    private string $_ip;

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->_lastName;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->_firstName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->_email;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->_phone;
    }

    /**
     * @return string
     */
    public function getAdress(): string
    {
        return $this->_adress;
    }

    /**
     * @return string
     */
    public function getIp(): string
    {
        return $this->_ip;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->_login;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->_password;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->_firstName = $firstName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->_lastName = $lastName;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->_email = $email;
    }

    /**
     * @param string $adress
     */
    public function setAdress(string $adress): void
    {
        $this->_adress = $adress;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->_phone = $phone;
    }

    /**
     * @param string $ip
     */
    public function setIp(string $ip): void
    {
        $this->_ip = $ip;
    }


    /**
     * @param string $login
     */
    public function setLogin(string $login): void
    {
        $this->_login = $login;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->_password = $password;
    }

}