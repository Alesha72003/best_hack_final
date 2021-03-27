<?php
 require_once $_SERVER['DOCUMENT_ROOT'] . '/template/header.php';

 $id = $_SESSION['id'];
 $query = "SELECT name,surname,patronymic FROM users WHERE id = $id ";
 $result  =  mysqli_query(db\getConnection(), $query);
 $user = mysqli_fetch_assoc($result);



 if(isset($_POST['name'])) {


 	// Делаем запрос к бд
 	$query = "INSERT INTO `users` (";
 	foreach (array_keys($_POST) as $value) {
 		 	$query = $query . "`$value`, ";
 	}
 	$query = substr($query, 0 , strlen($query)-2);
 	$query = $query . ')' . ' VALUES(';
 	foreach ($_POST as $value) {
 		 	$query = $query . "'$value', ";
 	}
 	$query = substr($query, 0 , strlen($query)-2);
 	$query = $query . ')';


 $res = mysqli_query(db\getConnection(), $query);
 header('Location: http://quedafoe.ru/route/employees_list/');

 }


?>
<main>

<div class="container">
 
<div class="mt-4"><a class="text-grey " href="/route/employees_list/"><i class="fa fa-chevron-left" aria-hidden="true"></i> Профиль</a></div>

<form action='/route/create_user/' method='POST'>
<table class="mt-4 table table-striped" >
  <tbody>
    
    
    <tr>
      <th scope="row">Имя</th>
      <td><input type="text" name="name"></td>
      
    </tr>
    <tr>
      <th scope="row">Фамилия</th>
      <td><input type="text" name="surname"></td>
      
    </tr>
    <tr>
      <th scope="row">Отчество</th>
      <td><input type="text" name="patronymic"></td>
      
    </tr>
    <tr>
      <th scope="row">Категория прав доступа</th>
      <td><input type="text" name="category_id"></td>
      
    </tr>
    <tr>
      <th scope="row">Логин</th>
      <td><input type="text" name="login"></td>
      
    </tr>
    <tr>
      <th scope="row">Пароль</th>
      <td><input type="text" name="pass"></td>
      
    </tr>
    <tr>
      <th scope="row">Почта</th>
      <td><input type="text" name="mail"></td>
      
    </tr>
    	 
   	

  </tbody>
</table>

<button type="submit" style="background-color: #D1243C;" class="btn btn-primary mt-3 mb-5">Добавить пользователя</button>

</form>



</div>
</main>
</body>
</html>


