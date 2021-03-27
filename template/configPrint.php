
<div class="navbar-categories">
       		<ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">

<?php
$id = $_SESSION['id'];
$query = "SELECT * FROM simulations WHERE parent_id = '$id'";
$connection =  db\getConnection();
$result  =  mysqli_query( $connection, $query );
if($result->num_rows == 0) echo "Нет записей конфигураций";
	while ($row = mysqli_fetch_assoc($result)) {
?>
		<li class="nav-item">
	        <a class="nav-link" id="one-tab" data-toggle="tab" href="?id=<?= $row['id'] ?>" role="tab" aria-controls="One" aria-selected="false"><?= $row['name'] ?></a>
	    </li>
<?php
	}

?>
			</ul>
</div>

