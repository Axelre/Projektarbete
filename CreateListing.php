<!DOCTYPE html>
<html>
    <head>
        <title>Create an ad</title>
        <link rel="stylesheet" href="CreateListingStyle.css?v=1.1">
        <?php include 'Database.php';
            include 'CreateListingInfo.php'
        ?>
        
    </head>
    <body>
    <div id="container">
        <div class="header">
            <h1>SHOEMARKET</h1>
        </div>
        <div class="topnav">
            <a class="home" href="#home">Home</a>
            <a href="#profile">Profile</a>
            <a href="#login">Log in</a>
        </div>
        <div class="formdiv">
            <div class="CreateListing">
                <form id="CreateListingForm" class="formclass" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <h4>Price : </h4>
                    <input class="inp" type="text" placeholder="Enter Price" name="price" required>  <br />
                    <h4>Size : </h4>
                    <input class="inp" type="text" placeholder="Enter Size" name="size" required>  <br />
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="male">Male</label><br>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label><br>
                    <input type="radio" id="unisex" name="gender" value="unisex">
                    <label for="unisex">Unisex</label><br><br><br>
                    <input type ="submit" name ="btnListing" value="Create Your Listing"> <br />
                </form>
            </div>
            <div class="CreateShoe">
                <form id="CreateShoeForm" class="formclass" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <h4>Model : </h4>
                    <input class="inp" type="text" placeholder="Enter Model" name="model" required>  <br />
                    <h4>Brand : </h4>
                    <input class="inp" type="text" placeholder="Enter Brand" name="brand" required>  <br />
                    <input type ="submit" name ="btnCreateShoe" value="Create Your Shoe"> <br />
                </form>
            </div>
        </div>
    </div>
    </body>
</html>