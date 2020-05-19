<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Messagebox</title>
</head>
<body>
    <?php

     date_default_timezone_set('Europe/Stockholm');
     echo "<form action='' method='POST'>
     Message: <br></br>
     <textarea name=Message rows=5 cols=60 color=white;>
     </textarea>
     <br>
     <input type='submit' name='submitBtn' value='Post'>
     </form>
     ";




     if(isset($_POST['submitBtn'])){
         $message = $_POST['Message'];
         $date = date('Y-m-d H:i:s');    
         include("db.php");
         $sql = "INSERT INTO messagebox (message, date) VALUES ('$message', '$date')";
         $db->query($sql);

     }

     include("db.php");
     $sql = "SELECT * from messagebox ORDER BY ID DESC";
     $stmt = $db->query($sql);
     $stmt->execute();
     $stmt->setFetchMode(PDO::FETCH_ASSOC);
     while($row = $stmt->fetch())
     {

     echo "
             <b>#</b>".$row['ID']."
             ".$row['Date']."
             <hr noshade>
             ".$row['Message']."
             <hr noshade>
              ";
     }

     ?>


</body>
</html>


