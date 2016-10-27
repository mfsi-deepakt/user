<?php
class User
{
	private  static $user = [];
    private static $login = '0';
    public function validate()
    {
        if(is_array($this->data)) {
            if (empty($this->data)) {
                return false;
            } elseif (!filter_var($this->data['email'], FILTER_VALIDATE_EMAIL)) {
                return false;
            } elseif ((!preg_match("/^[a-zA-Z ]*$/", $this->data['fname']) ) && (!preg_match("/^[a-zA-Z ]*$/", $this->data['fname']) ) ) {
                return false;
            } elseif(empty($this->data['password'])) {
                return false;
            }
            else 
            {
                return true;
            }
        } 
    }
    private function validateId($id)
    {
        if(empty($id) || !is_numeric($id))
        {
            return false;
        }
        else{
            return true;
        }
    }
    public function save()
    {
        if ($this->validate()) {
        	$id = count(static::$user) + 1;
        	static::$user[$id] = $this->data;
        	return $id;
        } else {
        	return false;
        }

    }

    public static function findById($id)
    {   
        return static::$user[$id];
    }

     public static function findAll()
    {
       	return static::$user;
    }

    public static function delete($id)
    {
       if($id <= count(static::$user))
       {
           unset(static::$user[$id]);
           return true;
       } else  {
        return false;
       }
    }
    public static function login($email, $password)
    {
     foreach(static::$user as $data)
     {  
        if(static::$login == '0' && $data['email'] == $email && $data['password'] == $password)
        {   static::$login = '1';
            return true;
        } else {
            return false;
        }
     }
    }

    public static function logout()
    {
        if(static::$login =='1')
        {
            static::$login == '0';
            return true;
        }else {
            return false;
        }
    }
}