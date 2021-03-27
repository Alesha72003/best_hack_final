<?php
 require_once $_SERVER['DOCUMENT_ROOT'] . '/template/header.php';
 require_once $_SERVER['DOCUMENT_ROOT'] . '/template/months.php';

 $idsim = $_SESSION['config-id'];
// Получение значений из бд



$supplies = mysqli_query(db\getConnection(), "SELECT * FROM fuel_supplies WHERE idsim = '$idsim' LIMIT 1");

var_dump($supplies);


// Установка новых значений 
 if(isset($_POST['junary'])) {


 	// Делаем запрос к бд
 	$res = mysqli_query(db\getConnection(), "DELETE FROM `fuel_supplies` WHERE (`idsim` = '$idsim'); ");

 	$query = "INSERT INTO `fuel_supplies` ( `idsim`, ";
 	foreach (array_keys($_POST) as $value) {
 		 	$query = $query . "`$value`, ";
 	}
 	$query = substr($query, 0 , strlen($query)-2);
 	$query = $query . ')' . " VALUES( '$idsim', ";
 	foreach ($_POST as $value) {
 		 	$query = $query . "'$value', ";
 	}
 	$query = substr($query, 0 , strlen($query)-2);
 	$query = $query . ')';

    $res = mysqli_query(db\getConnection(), $query);
    //header('Location: http://quedafoe.ru/route/employees_list/');

 }

?>
<script src="/js/Chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="/css/Chart.min.css">
<main>
<div class="container ">
	<div class="row mt-5">
		
	    <ul class="nav nav-tabs card-header-tabs ">
	    	<li > <a href="/route/fuel" class="active h1 text-grey my-2 ml-3 nav-item">Топливо</a></li>
	    	<li style="margin-left: 40px;"> <a href="/route/refills_list" class="  h1 text-grey my-2 nav-item">Список заправок</a></li>
	    	
	    </ul>
	</div>
	<form action="/route/fuel/" method="POST">
		<div class="row mt-5">
			<div class="col-md-1 ">
				<ul>
				<?php foreach ($months as $value) { 
					//$row = mysqli_fetch_assoc($supplies);
					?>
					
				<li class="flex-box statistic-element">
					<input type="text" class="fuel-input" name="<?= $value ?>" value="100">
				</li>

				 <?php } ?>
				
				
				
			</ul>   
			</div> 	
			<div class="col">
				<canvas id="myChart" width="400" height="400"></canvas>
			</div>
			
			<button type="submit" style="background-color: #D1243C;" class="btn btn-primary mt-3 mb-5">Сохранить</button>
	    </div>
    </form>
	
</div>
</main>
<script>
	var horizontalBarChartData = {
		labels: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"],
		datasets: [{
			label: 'Dataset 1',
			backgroundColor: "#000000",
			borderColor: "#FF0000",
			borderWidth: 1,
			data: []
		}]
	};
	
	function onchange() {
		elems = $("ul > li.flex-box > input");
		for (let i = 0; i < elems.length; i++) {
			myHorizontalBar.data.datasets[0].data[i] = elems[i].value;
		}
		myHorizontalBar.update();
	}
	
	window.onload = function() {
		var ctx = document.getElementById('myChart').getContext('2d');
		window.myHorizontalBar = new Chart(ctx, {
			type: 'horizontalBar',
			data: horizontalBarChartData,
			options: {
				// Elements options apply to all of the options unless overridden in a dataset
				// In this case, we are setting the border of each horizontal bar to be 2px wide
				elements: {
					rectangle: {
						borderWidth: 2,
					}
				},
				responsive: true,
				legend: {
					position: 'right',
				},
				scales: {
					xAxes: [{
						ticks: {
							min: 0,
							suggestedMax: 100
						}
					}]
				},
				title: {
					display: false,
					text: 'Chart.js Horizontal Bar Chart'
				}
			}
		});
		$("ul > li.flex-box > input").on("change", onchange);
		onchange();

	};
</script>
</body>
</html>
