<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

include("db.php");

$query = $db->query("SELECT brand from shoe ORDER BY brand DESC");

echo '<select brand="DROP DOWN BRAND">';
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    echo '<option value="'.$row['brand'].'"> </option>';
 }
 echo '</select>';

 $query2 = $db->query("SELECT model from shoe ORDER BY model DESC");
echo '<select model="DROP DOWN model">';
while ($row = $query2->fetch(PDO::FETCH_ASSOC)) {
    echo '<option value="'.$row['model'].'"> </option>';
 }
 echo '</select>';



?>

</body>
</html>