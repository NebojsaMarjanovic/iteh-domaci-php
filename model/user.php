<?php

class User{
    public $id;
    public $name;
    public $katedra;
    public $email;
    public $password;
    public $kabinet;

    public function __construct($id,$name, $katedra, $email,$password,$kabinet)
    {
        $this->id = $id;
        $this->name = $name;
        $this->katedra=$katedra;
        $this->email = $email;
        $this->kabinet = $kabinet;

        
    }

    public static function addUser($ime,$katedra, $email, $sifra,$kabinet, mysqli $conn){
        $sql="insert into user (name,email,katedra,password,kabinet) 
        values ('".$ime."', '".$email."', '".$katedra."','".$sifra."','".$kabinet."')"; 
    
        $result=mysqli_query($conn,$sql);
    
        if($result){
         echo "<script>alert('Uspesno ste dodali moderatora')</script>";  
        }else{
            die(mysqli_error($conn));
        }
    }

    public static function Login($email, $password,mysqli $conn){  
        $res = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' AND password = '$password'");  
        $user_data = mysqli_fetch_object($res);  
        $no_rows = mysqli_num_rows($res);  
        if ($no_rows == 1)   
        {  
           return $user_data;
        }  
        else  
        {  
            return null;  
        }  
    } 
    
    public static function showUsers(mysqli $conn){
        $sql="SELECT name, email,katedra,kabinet from user";
    
        $result=mysqli_query($conn,$sql);
    
        return $result;
        
    }
}
?>