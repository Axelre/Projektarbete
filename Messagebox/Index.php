<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Messagebox</title>
</head>
<body>
    <?php

     echo "<form action='' method='POST'>
     Message: <br></br>
     <textarea name=Message rows=5 cols=60 color=white;>
     </textarea>
     <br>
     <input type='submit' name='submitBtn' value='Send Entry'>
     </form>
     ";

     if(isset($_POST['submitBtn'])){
         $message = $_POST['message'];
         $date = date("y-m-d");
         include("db.php");
         $sql = "INSERT INTO entries (message, date) VALUES ('$message', '$date')";
         $stmt = $db->query($sql);
         $stmt->execute();
         echo "Success!";

     }

     include("db.php");

     $sql = "SELECT * from entries ORDER BY ID DESC";
     $stmt = $db->query($sql);
     $stmt->execute();
     $stmt->setFetchMode(PDO::FETCH_ASSOC);
     if($stmt->rowCount() > 0){
         while($row = $stmt->fetch())
         {
             echo "
             <b>#</b>".$row['ID']."
             ".$row['Time']."
             ".$row['Date']."
             <hr noshade>
             ".$row['Message']."
             <hr noshade>
              ";
         }
     }

     ?>


</body>
</html>


