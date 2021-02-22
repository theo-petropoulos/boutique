<?php

    class User{
        public $firstname;
        public $lastname;
        public $numadress;
        public $adress;
        public $compadress;
        public $phone;
        public $postal;
        public $city;
        public $ip;

        public function __construct($post){
            $this->firstname=ucfirst(strtolower($post['firstname']));
            $this->lastname=ucfirst(strtolower($post['lastname']));
            $this->numadress=$post['numadress'];
            $this->adress=$post['adress'];
            $this->compadress=$post['compadress'];
            $this->phone=$post['phone'];
            $this->postal=$post['postal'];
            $this->city=ucfirst(strtolower($post['city']));
            $this->ip=$_SERVER['REMOTE_ADDR'];
        }
    }