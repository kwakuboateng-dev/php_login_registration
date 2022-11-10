<?php 

  class RegisterUser {
    private $username;
    private $new_user;
    private $users_stored;
    private $password;
    private $encrypted_password;
    private $database = "data.jason";
    public $error;
    public $success;

    public function __construct($username, $password)
    {

    
      $this->username = trim($this->username);
      $this->username = filter_var($username, FILTER_SANITIZE_STRING);
      $this->password = filter_var(trim($password), FILTER_SANITIZE_STRING);
      $this->encrypted_password = password_hash($this->password, PASSWORD_DEFAULT);
      $this->users_stored = json_decode(file_get_contents($this->database), true);
      
      $this->new_user = [
        "username" => $this->username,
        "password" => $this->encrypted_password,
      ];

      if($this->checkFieldValues()){
        $this->insertUser();
      }

    }
  

     private function checkFieldValues(){
       if(empty($this->username) || empty($this->password)){
        $this->error = "Both fields are required";
        return false;
       }
       else{
        return true;
       }
    }
    
     private function usernameExists(){
      foreach($this->users_stored as $user){
        if($this->users_stored == $user['username']){
          $this->error = "Username already taken. Please choose a different one";
          return true;
        }
        return false;
      }
    }

    private function insertUser(){
       if($this->usernameExists( )== false){
        array_push($this->users_stored, $this->new_user);
        if(file_put_contents($this->storage, json_encode($this->stored_users, JSON_PRETTY_PRINT))){
          return $this->success = "Your Registration was successful";
        }
        else{
          return $this->error = "Something went wrong, please try again";
        }
       }
    }

   
   

  }
?>