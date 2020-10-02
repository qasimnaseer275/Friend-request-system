<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <h1 align="center"> Freind Request Managment System</h1>
        <h3 align="center">Register, Login Page</h3>
        <h3>Register Yourself</h3>
        <form method="post" action="asset/register.php">
            <input type="text" name="name" autocomplete="off"/><br/>
            <input type="email" name="email" autocomplete="off"/><br/>
            <input type="password" name="pass" autocomplete="off"/><br/>
            <input type="submit" name="r_btn" value="Register"/>
        </form>
        <br/><br/>
        <h3>Login</h3>
        <form method="post" action="asset/login.php">
            <input type="email" name="email2" autocomplete="off"/><br/>
            <input type="password" name="pass2" autocomplete="off"/><br/>
            <input type="submit" name="l_btn" value="Login"/>
        </form>        
    </body>
</html>