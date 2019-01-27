<?php

namespace App\Models;
use App\Models\ModelBase;
use App\Models\Database;
class User extends ModelBase
{
    public $name;
    public $lastname;
    public $username;
    public $email;
    public $password;

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
    public static function saveUser($datas)
    {
        $db = new ModelBase();
        $saveUser = $db->insertar('users', $datas);
        
    }
    public static function getUserbyusername($username){
        $db = new Database();
        $query = "SELECT * FROM users WHERE username = '" . $username ."'";
        $sentencia = $db->prepare($query);
        $sentencia->execute(array($username));
        $result = $sentencia->fetch();
        return $result;
    }
    public static function getUserbyeemail($email){
        $db = new Database();
        $query = "SELECT * FROM users WHERE email = '" . $email ."'";
        $sentencia = $db->prepare($query);
        $sentencia->execute(array($email));
        $result = $sentencia->fetch();
        return $result;
    }
}