<!DOCTYPE html>
<html>
    <head>
        <title>Login Shoebox</title>
        <link rel="stylesheet" href="loginstyle.css?v=1.1">
        <?php include 'Database.php';
        include 'Databaseinfo.php';
        ?>
        
    </head>
    <body>
        <script>
            function addCreateUserForm()
            {
                document.getElementById('LoginForm').style.display = 'none';
                document.getElementById('CreateUserForm').style.display = 'block';
            }
            function addLoginForm()
            {
                document.getElementById('CreateUserForm').style.display = 'none';
                document.getElementById('LoginForm').style.display = 'block';
            }
        </script>
        <div class="hero">
            <div class="form-box">
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" onclick="addLoginForm();" class="toggle-btn">Log In</button>
                    <button type="button" onclick="addCreateUserForm();" class="toggle-btn">Register</button>
                </div>
                <form id="CreateUserForm" class="formclass" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <h4>E-Mail : </h4>
                    <input class="inp" type="text" placeholder="Enter E-mail" name="email" required>  <br />
                    <h4>Username : </h4>
                    <input class="inp" type="text" placeholder="Enter Username" name="username" required>  <br />
                    <h4>Phonenumber : </h4>
                    <input class="inp" type="text" placeholder="Enter phonenumber" name="phonenumber" required>  <br />
                    <h4>Password : </h4>
                    <input class="inp" type="password" placeholder="Enter Password" name="password" required>  <br />
                    <input type ="submit" name ="btnCreate" value="Create Your User"> <br />
                    <span class="error" style="color: red"> <?php echo $formError;?></span> <br />
                    <span class="error" style="color: red"> <?php echo $emailError;?></span> <br />
                    <span class="error" style="color: red"> <?php echo $phoneError;?></span>
                    <span class="success" style="color: green"> <?php echo $formSucces;?></span> <br />
                </form>
                <form id="LoginForm">
                    <h4>E-Mail : </h4>
                    <input class="inp" type="text" placeholder="Enter E-mail" name="existing_user_email" required>  <br />
                    <h4>Password : </h4>
                    <input class="inp" type="password" placeholder="Enter Password" name="existing_user_password" required>  <br />
                    <input type ="submit" name ="btnLogin" value="Login"> <br />
                </form>
            </div>
        </div>
    </body>
</html>