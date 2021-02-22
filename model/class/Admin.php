<?php
//namespace App;

class Admin
{
    protected string $_login;
    protected string $_password;

    protected function hydrate(array $array)
    {
        foreach ($array as $index => $item) {
            $method = 'set' . ucfirst($index);
            if (method_exists($this, $method)) {
                $this->$method($index);
            }
        }
    }
}


