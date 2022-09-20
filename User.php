<?php
class User {
    private $user_id;
    private $email;
    private $user_type;

    function __construct($user_id,$email,$user_type){
        $this->user_id = $user_id;
        $this->email = $email;
        $this->user_type = $user_type;
    }


    public function getUserId()
    {
        return $this->user_id;
    }

   
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function getEmail()
    {
        return $this->email;
    }

  
    public function setEmail($email)
    {
        $this->email = $email;
    }

    
    public function getUserType()
    {
        return $this->user_type;
    }

    public function setUserType($user_type)
    {
        $this->user_type = $user_type;
    }
}

?>