<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login page</title>
</head>	

<body>
	<h1> Please login to enter the site! </h1>
    
    <form method="POST" action="login.php">
    	<fieldset>
        	<legend>Login form</legend>
   				<p> 
                		Username: <input type="text" name="username" size="20"><br>
    				Password: <input type="password" name="password" size="20">
                </p>
        </fieldset>
<br>
    	<input type="submit" value="Submit" name="login">
    </form>
<br>
<p> Nog geen account ?</p>
<a href="registreer.php"><input type="submit" value="register" name="register"></a >

</body>
</html>
