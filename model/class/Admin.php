<?php

class Admin extends User
{
    private string $_mail;
    private string $_password;
    private string $_role = "administrateur";


    protected function hydrate(array $array)
    {
        foreach ($array as $index => $item) {
            $method = 'set' . ucfirst($index);
            if (method_exists($this, $method)) {
                $this->$method($index);
            }
        }
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

}


