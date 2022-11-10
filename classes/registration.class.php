<?php 

  class RegisterUser{
    private $username;
    private $new_user;
    private $users_stored;
    private $password;
    private $encrypted_password;
    private $database = "data.jason";
    public $error;
    public $success;

    public function __construct($user, $password)
    {
      $this->username = filter_var(trim($username), FILTER_SANITIZE_STRING);
      $this->password = filter_var(trim($password), FILTER_SANITIZE_STRING);
      $this->encryped_password = password_hash($password, PASSWORD_DEFAULT);
      $this->stored_users = json_decode(file_get_contents($this->storage), true);
      
      $this->new_user = [
        "username" => $this->username,
        "password" => $this->encrypted_password,
      ];

    }
    
    private insertUser(){
       
    }

    private usernameExists(){
      foreach(this->stored_users as $user){
        if($this->stored_users == $user['username']){
          $this->error = "Username already taken. Please choose a different one";
          return true;
        }
      }
    }

    private checkFieldValues(){
       if(empty($this->username) || empty($this->raw_password)){
        $this-error = "Both fields are required";
        return false;
       }
       else{
        return true;
       }
    }

  }
?>