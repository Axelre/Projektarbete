<?php
    global $phoneError;
    global $formError;
    global $formSucces;
    global $emailError;

    if (isset($_POST['btnCreate'])) 
    {
        createAccount();
        return;
    }

    if (isset($_POST['btnLogin']))
    {
        getLogin();
        return;
    }

    function createAccount() 
        {
            require("database.php");
            $Phonenumber = $_POST['phonenumber'];
            $Username = test_input($_POST['username']);
            $Email = test_input($_POST['email']);
            $Password = $_POST['password'];
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
                $statement =$db->prepare("INSERT INTO User (Username , Email , Phone, Password) VALUES (:username , :email , :phone , :password)");

                $statement->bindParam(':username', $Username);
                $statement->bindParam(':email', $Email);
                $statement->bindParam(':phone', $Phonenumber);
                $statement->bindParam(':password', $Password);
                $formSucces = "Your Account has been created!";
                $statement->execute();
            }
        }
    }

    function getLogin()
    {
        require("database.php");
        $uid = $_POST['uid'];
        $pwd = $_POST['pwd'];
        $sql = "SELECT * FROM User WHERE Username='$uid' AND Password='$pwd'";
        $result = $db->query($sql);
        if("SELECT * FROM $result" > 0){
        if($row = $result->fetchArray(SQLITE3_ASSOC)){
            $_SESSION['User_id'] = $row['User_id'];
            exit();
        }
        }
        else exit();
    }
    function userLogout(){
        session_start();
        session_destroy();
        exit();
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