<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/font-awesome.css" rel="stylesheet">
<link href="assets/css/main.css" rel="stylesheet">
  </head>
<link rel="stylesheet" href="./wtyle.css">

</head>
<body>

<?php 
$host=$_SERVER['RDS_HOSTNAME']; 
$mysql_user=$_SERVER['RDS_USERNAME'];
$mysql_pwd=$_SERVER['RDS_PASSWORD']; 
$dbms=$_SERVER['RDS_DB_NAME']; 

$con = new mysqli($_SERVER['RDS_HOSTNAME'], $_SERVER['RDS_USERNAME'], $_SERVER['RDS_PASSWORD'], $_SERVER['RDS_DB_NAME'], $_SERVER['RDS_PORT']);
if (!$con) die('Could not connect: ' . mysql_error());

$con->query("DROP TABLE IF EXISTS admin");
$con->query("CREATE TABLE 'admin' (
'id' int(14) NOT NULL,
'name' varchar(40) NOT NULL,
'email' varchar(40) NOT NULL,
'pass' varchar(20) NOT NULL
)");
$con->query("INSERT INTO 'admin' ('id', 'name', 'email', 'pass') VALUES
(1, 'Administrator One', 'admin@gmail.com', 'Password@123'),
(2, 'Administrator Two', 'admin2@gmail.com', 'admin2');");

$con->query("DROP TABLE IF EXISTS user");
$con->query("CREATE TABLE 'user' (
    'name' varchar(40) NOT NULL,
    'email' varchar(40) NOT NULL
  )");

$sql = "INSERT INTO user ('name','email')
                    VALUES('$name','$email')";
$con->query($sql);

header("Location:index.php");
?>

<!-- partial:index.partial.html -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php"><h4 style="color:white">E-Bill Calculator</h4></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php" style="padding-right:20px;">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="calc.php" style="padding-right:20px;">Calculator</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="signupd.php" style="padding-right:20px;">Login / SignUp</a>
      </li>
    </ul>
  </div>
</nav>

<div id="login-form-wrap">
  <h2>Login</h2>
  <form id="login-form" action="signupd.php">
    <p>
    <input type="text" name="name" id="name" placeholder="Name" required><i class="validation"><span></span><span></span></i>
    </p>
    <p>
    <input type="email" name="email" id="email" placeholder="Email Address" required><i class="validation"><span></span><span></span></i>
    </p>
    <p>
    <input type="submit" id="login" value="Login">
    </p>
  </form>
  <div id="create-account-wrap">
    <p>Not a member? <a href="#">Create Account</a><p>
  </div><!--create-account-wrap-->
</div><!--login-form-wrap-->
<!-- partial -->
  
</body>
</html>
