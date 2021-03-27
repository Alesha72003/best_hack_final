<!DOCTYPE html>
<html>
<head>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="/css/all.min.css">
      <link rel="stylesheet" type="text/css" href="/css/main.css">
      <link rel="stylesheet" type="text/css" href="/css/animate.min.css">

        <!-- Подключение helpers -->
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/helpers/db.php'; ?>
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
      <!--  Title-->
      <title>Газпром</title>
</head>

<body>


<?php

session_start();

if(isset($_SESSION['auth']) && $_SESSION['auth'] == true)
{
	header('Location: http://quedafoe.ru/route/menu');
}

$connection =  db\getConnection();



if( isset($_POST['login'])){



	$login = $_POST['login'];
	$pass = $_POST['password'];

	mysqli_real_escape_string($connection, $login);
	mysqli_real_escape_string($connection, $pass);



	$query   = "SELECT id,login, pass FROM users WHERE login= '$login' AND pass = '$pass' LIMIT 1 ";
	$result  =  mysqli_query( $connection, $query );
	if ( !$result ) echo "Произошла ошибка: "  .  mysqli_error();

	if($result ->num_rows == 0){
		echo "Bad";
	} else {
      $row = mysqli_fetch_assoc($result);
		$_SESSION['auth'] = true;
      $_SESSION['id']   = $row['id'];
		header('Location: http://quedafoe.ru/route/menu');

	}
}

?>

<div id="main-container" class="container-fluid">
   <div class="row">
      <div id="auth-form" class="card border-primary">
         <h5 class="card-header bg-primary text-white">
            Auth Form
         </h5>
         <div class="card-body">
            <form class="panel-body" method="POST" action="index.php">
               <div class="input-group">
                  <span class="input-group-text">
                  <i class="fa fa-user"></i>
                  </span>
                  <input type="text" id="login" name="login" class="form-control" placeholder="Login">
               </div>
               <div class="input-group">
                  <span class="input-group-text">
                  <i class="fa fa-lock"></i>
                  </span>
                  <input type="password" id="password" name="password" class="form-control" placeholder="Password">
               </div>
               <button type="submit" class="btn btn-primary">Login</button>
            </form>
         </div>
      </div>
   </div>
</div>



</body>

</html>