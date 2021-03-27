<?php
 require_once $_SERVER['DOCUMENT_ROOT'] . '/template/header.php';
?>

<main>
<div class="container">

<div class="row mt-4 flex">
      <div class="col-md-9"><h1 class="main-title">Администрирование<br></h1></div>
      <div class="col-md-3"><a id="create_conf" href="/route/create_user"><p>Создать нового пользователя <i class="fa fa-plus-square" aria-hidden="true"></i> </p></a></div>
    </div>



<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Имя</th>
      <th scope="col">Фамилия</th>
      <th scope="col">Отчество</th>
      <th scope="col">Группа прав</th>
      <th scope="col">Логин</th>
      <th scope="col">Почта</th>
    </tr>
  </thead>
  <tbody>
  	<?php 

  	$connection =  db\getConnection();


  	$query   = "SELECT id, name, surname, patronymic, category_id, login, mail FROM users";
	$result  =  mysqli_query( $connection, $query );

	//while ($row = mysqli_fetch_assoc($result)) {
	//	var_dump($row);
	//}
  	?>


  	<?php while($row = mysqli_fetch_assoc($result)) {?>
    <tr>
      <th scope="row"><?= $row['id'] ?></th>
      <td><?= $row['name'] ?></td>
      <td><?= $row['surname'] ?></td>
      <td><?= $row['patronymic'] ?></td>
      <td><?= $row['category_id'] ?></td>
      <td><?= $row['login'] ?></td>
      <td><?= $row['mail'] ?></td>
    </tr>
    <?php } ?>



  </tbody>
</table>



</div>
</main>
</body>
</html>