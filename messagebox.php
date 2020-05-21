<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Messagebox</title>
</head>
<body>
    <?php

    echo "<form action='Pendingtrades.html' method='POST'> <input type='submit' name='goback' value='Go back'>
    </form>";

     include("db.php");
     $sql = "SELECT * from messagebox ORDER BY ID DESC";
     $stmt = $db->query($sql);
     $stmt->execute();
     $stmt->setFetchMode(PDO::FETCH_ASSOC);
     while($row = $stmt->fetch())
     {

     echo "<div>
             <b>#</b>".$row['ID']."
             ".$row['Date']."
             <hr noshade>
             ".$row['Message']."
             <hr noshade>
              </div>";
     }


     date_default_timezone_set('Europe/Stockholm');

     if(isset($_POST['submitBtn'])){
         $message = $_POST['Message'];
         $date = date('Y-m-d H:i:s');    
         include("db.php");
         $sql = "INSERT INTO messagebox (message, date) VALUES ('$message', '$date')";
         $db->query($sql);

     }


     ?>


</body>
</html>


