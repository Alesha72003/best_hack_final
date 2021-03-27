<?php
$id = $_GET['id'];
$query = "SELECT * FROM simulations WHERE id = '$id' LIMIT 1";
$connection =  db\getConnection();
$result  =  mysqli_query( $connection, $query );
if($result->num_rows == 0) echo "Нет записи с таким ID!";
else {
	$row = mysqli_fetch_assoc($result);
}
$i = 1;

?>
<table class="mt-4 table table-striped">
  <tbody>
    
    <?php
    foreach ($config_params as $value) {
    ?>
    <tr>
      <th scope="row"><?= ($value['title']) ?></th>
      <td><?= $row[array_keys($row)[$i++]] ?></td>
      
    </tr>
    	 
   	<?php
    }
    ?>

  </tbody>
</table>