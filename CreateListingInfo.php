<?php

global $phoneError;
global $formError;
global $formSucces;
global $emailError;

if (isset($_POST['btnCreateShoe'])) 
{
    echo "isset works";
    AddShoe();
    return;
}

function AddShoe()
{
    require("Database.php");
    $Model = $_POST['model'];
    $Brand = $_POST['brand'];
    echo "AddShoe is called";
    echo "$Model";
    echo "$Brand";
    if(empty($Model) || empty($Brand))
    {
        $formError = "please fill in every box";
    }
    else
    {
        $sql = "INSERT INTO Shoe (Model , Brand) VALUES ('$Model' , '$Brand')";
        $result = $db->query($sql);
        $formSucces = "Your shoe has been created!";
        echo "Else is called";
    }
}
?>