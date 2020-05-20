<?php
        require("database.php");
        $Phonenumber = $_POST['phonenumber'];
        $Username = test_input($_POST['username']);
        $Email = test_input($_POST['email']);
        $Password = $_POST['password'];
        $salt = random_bytes(8);
        $salt_password = md5($salt.$password);
        global $phoneError;
        global $formError;
        global $formSucces;
        global $emailError;
        
        if(empty($Phonenumber) || empty($Username) || empty($Email) || empty($Password))
        {
            $formError = "please fill in every box";
        }
        else
        {
            if (validate_phonenumber($Phonenumber) == false) 
            {
                $phoneError = "Phonenumber is incorrectly formated";
            }
            else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) 
            {
                $emailError = "Invalid e-mail format";
            }
            else
            {
                $statement =$db->prepare("INSERT INTO User (Username , Email , Phone, Password, Salt) VALUES (:username , :email , :phone , :password , :salt)");
                $statement->bindParam(':username', $Username);
                $statement->bindParam(':email', $Email);
                $statement->bindParam(':phone', $Phonenumber);
                $statement->bindParam(':password', $salt_password);
                $statement->bindParam(':salt', $salt);
                $statement->execute();
                $formSucces = "Your Account has been created!";
            }
        }

    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function validate_phonenumber($data)
    {
        $filtered_phonenumber = filter_var($data, FILTER_SANITIZE_NUMBER_INT);
        $phonenumber = str_replace("-", "", $filtered_phonenumber);
        if (strlen($phonenumber) < 10 || strlen($phonenumber) > 14)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
?>