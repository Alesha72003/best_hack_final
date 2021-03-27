<?php
 require_once $_SERVER['DOCUMENT_ROOT'] . '/template/header.php';
 if(!isset($_SESSION['config-id'])){
 echo "<script>alert('Вы не запустили симуляцию!')</script>";
 header('Location: http://quedafoe.ru/route/menu/');

 }

?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<div class="row mt-5">
		
	    <ul class="nav nav-tabs card-header-tabs ">
	    	<li > <a href="/route/refills_list" class=" active h1 text-grey my-2 nav-item">					Список заправок</a></li>
	    	<li style="margin-left: 40px;"> <a href="/route/fuel" class="h1 text-grey my-2 ml-3 nav-item">	Топливо</a></li>
	    </ul>
    </div>
<div class="navbar-categories">
       		<ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
	            <li class="nav-item">
	                <a class=" active nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="false">По названию <i class="fa fa-sort" aria-hidden="true"></i>
</a>
	            </li>
	            <li class="nav-item">
	                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="true">Остатки топлива</a>
	            </li>
	            <li class="nav-item">
	                <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">Доходы</a>
	            </li>
	            <li class="nav-item">
	                <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">Расходы</a>
	            </li>
          </ul>
       	</div>



<table class="table table-striped mt-5 table-hover ">
  <thead>
    <tr >
      <th scope="col">Название</th>
      <th scope="col">Сотрудники</th>
      <th scope="col">Остатки топлива</th>
      <th scope="col">Доходы</th>
       <th scope="col">Расходы</th>
        <th scope="col">Сальдо</th>
    </tr>
  </thead>
  <tbody>
  	
    <tr class="mouse-hover" onclick="window.location.href='/route/refill/?id=0'; return false">
      <th scope="row">АЗС №1</th>
      <td>
      	<div class="row">
      		<div class="col">
      			<p class="active">Д</p>
      			<p>1</p>
      		</div>
      		<div class="col">
      			<p class="active">К</p>
      			<p>1</p>
      		</div>
      		<div class="col">
      			<p class="active">З</p>
      			<p>1</p>
      		</div>
      		<div class="col">
      			<p class="active">О</p>
      			<p>2</p>
      		</div>
      	</div>
      </td>
      <td>95%</td>
      <td>8000000</td>
      <td>6000000</td>
      <td>+1000000</td>
    </tr>
  
     <tr class="mouse-hover"  onclick="window.location.href='/route/refill/?id=0'; return false">

      <th scope="row">АЗС №2</th>
      <td>
      	<div class="row">
      		<div class="col">
      			<p class="active">Д</p>
      			<p>1</p>
      		</div>
      		<div class="col">
      			<p class="active">К</p>
      			<p>1</p>
      		</div>
      		<div class="col">
      			<p class="active">З</p>
      			<p>1</p>
      		</div>
      		<div class="col">
      			<p class="active">О</p>
      			<p>2</p>
      		</div>
      	</div>
      </td>
      <td>95%</td>
      <td>8000000</td>
      <td>6000000</td>
      <td>+1000000</td>
    </tr>
    <tr class="mouse-hover"  onclick="window.location.href='/route/refill/?id=0'; return false">

      <th scope="row">АЗС №3</th>
      <td>
      	<div class="row">
      		<div class="col">
      			<p class="active">Д</p>
      			<p>1</p>
      		</div>
      		<div class="col">
      			<p class="active">К</p>
      			<p>1</p>
      		</div>
      		<div class="col">
      			<p class="active">З</p>
      			<p>1</p>
      		</div>
      		<div class="col">
      			<p class="active">О</p>
      			<p>2</p>
      		</div>
      	</div>
      </td>
      <td>95%</td>
      <td>8000000</td>
      <td>6000000</td>
      <td>-1000000</td>
    </tr>
  </tbody>
</table>

<script>
    function getFuel(a) {
        return a.children[2].textContent.substring(0, a.children[2].textContent.length-1);
    }
    
    function getPlus(a) {
        return a.children[3].textContent;
    }
    function getMinus(a) {
        return a.children[4].textContent;
    }
    
    function sorting(func) {
        rez = [];
        list = $(".mouse-hover");
        for (let i = 0; i < list.length; i++) {
            rez.append({src: list[i], rez: func(list[i])});
        }
        rez.sort(key);
        for (let i = 0; i < list.length; i++) {
            list.parent().append(rez[i].src);
        }
        
    }
    
    function key(a, b) { return a.rez > b.rez }
</script>

	
<?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/template/footer.php' ?>

