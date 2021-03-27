<?php
 require_once $_SERVER['DOCUMENT_ROOT'] . '/template/header.php';

 $connection  = db\getConnection();
 $id          = $_SESSION['id'];
 $query       = "SELECT name,surname,patronymic FROM users WHERE id = $id ";
 $result      =  mysqli_query($connection, $query);
 $user        = mysqli_fetch_assoc($result);



 if(isset($_POST['name'])) {
 	// Делаем запрос к бд
 	$query = "INSERT INTO `simulations` (";
 	foreach (array_keys($_POST) as $value) {
 		 	$query = $query . "`$value`, ";
 	}
 	$query = substr($query ,0 , strlen($query) - 2);
 	$query = $query . ')' . ' VALUES ( ';
 	foreach ($_POST as $value) {
 		 	$query = $query . "'$value', ";
 	}
 	$query = substr($query, 0 , strlen($query)-2);
 	$query = $query . ')';


 	$res = mysqli_query($connection, $query);
  header('Location: http://quedafoe.ru/route/menu');

 }



?>

  <div class="mt-4"><a class="text-grey " href="/route/menu/"><i class="fa fa-chevron-left" aria-hidden="true"></i> Профиль</a></div>
	<div class="row mt-5">
      <div class="col-md-2">
      	<svg class="bd-placeholder-img rounded-circle" width="140" height="140"  role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
      </div>
      <div class="col">
      	<h4 style="color: #D1243C;"><p><?= $user['name'] .' ' . $user['patronymic'] . ' ' . $user['surname']?> <a style="color: grey;" href="/helpers/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a></p></h4>
      	<p>Разработчик</p>
      </div>
    </div>
  <div class="row mt-4 flex">
			<div class="col-md-9"><h1 class="main-title">Создание конфигурации<br></h1></div>
			
    </div>

  
<form action='/route/create_conf/' method='POST'>
<table class="mt-4 table table-striped" >
  <tbody>
    
    <?php
    foreach ($config_params as $value) {
    ?>
    <tr>
      <th scope="row"><?= ($value['title']) ?></th>
      <td><input type="text" name="<?= ($value['param']) ?>"></td>
      
    </tr>
    	 
   	<?php
    }
    ?>

  </tbody>
</table>

<button type="submit" style="background-color: #D1243C;" class="btn btn-primary mt-3 mb-5">Добавить конфигурацию</button>

</form>

<?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/template/footer.php' ?>



