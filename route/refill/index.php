<?php
 require_once $_SERVER['DOCUMENT_ROOT'] . '/template/header.php';
?>
<main>
<div class="container">
	<div class="mt-4"><a class="text-grey " href="/route/refills_list/"><i class="fa fa-chevron-left" aria-hidden="true"></i> Список заправок</a></div>
	<div class="row mt-2 flex">
			<div class="col-md-9"><h1 class="active main-title">АЗС № <?= $_GET['id']?><br></h1></div>
    </div>
    <div class="row mt-2 flex">
			<div class="col-md-9"><h3 class="">Сотрудники </h3></div>
    </div>



    <div class="row">
        <div class="col-md-3 ">
          <div class="card mb-4 shadow-sm staff-card rounded" >
            <div class="card-body row ">
            	<div class="col-md-9">
            		<h6>Директор</h6>
            		<div class="row-md-1 flex-box">
   
            				<img class="staff-icon" src="/img/cat.jpg">
            				<p>Фетисов Андрей Юрьевич</p>
            			
            			
						
            		</div>
            	</div>
            	<div class="col-md-1 active">
            		<h1>1</h1>
            	</div>
            </div>
            
          </div>
        </div>
        <div class="col-md-3">
          <div class="card mb-4 shadow-sm staff-card rounded">
            <div class="card-body row">
            	<div class="col-md-9">
            		<h6>Охранник</h6>
            		<div class="row-md-1 flex-box">
   
            				<img class="staff-icon" src="/img/cat.jpg">
            				<p>Фетисов Андрей Юрьевич</p>
            			
            			
						
            		</div>
            	</div>
            	<div class="col-md-1 active">
            		<h1>1</h1>
            	</div>
            </div>
            
          </div>
        </div>
        <div class="col-md-3">
          <div class="card mb-4 shadow-sm staff-card rounded">
            <div class="card-body row">
            	<div class="col-md-9">
            		<h6>Кассир</h6>
            		<div class="row-md-1 flex-box">
   
            				<img class="staff-icon" src="/img/cat.jpg">
            				<p>Фетисов Андрей Юрьевич</p>
            			
            			
						
            		</div>
            	</div>
            	<div class="col-md-1 active">
            		<h1>1</h1>
            	</div>
            </div>
            
          </div>
        </div>
        <div class="col-md-3">
          <div class="card mb-4 shadow-sm staff-card rounded">
            <div class="card-body row">
            	<div class="col-md-9">
            		<h6>Заправщик</h6>
            		<div class="row-md-1 flex-box">
   
            				<img class="staff-icon" src="/img/cat.jpg">
                              <p>Фетисов Андрей Юрьевич</p>
            				
            		</div>
                    
            		<div class="row-md-1 flex-box">
   
            				<img class="staff-icon" src="/img/cat.jpg">
            				<p>Конюхов Андрей Юрьевич</p>
            		</div>
            		<div class="row-md-1 flex-box">
   
            				<img class="staff-icon" src="/img/cat.jpg">
            				<p>Антонов Андрей Юрьевич</p>
            		</div>
            	</div>
            	<div class="col-md-1 active">
            		<h1>3</h1>
            	</div>
            </div>
            
          </div>
        </div>

      </div>


      <div class="navbar-categories">
       		<ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">

		<li class="nav-item">
	        <a class="nav-link text-black" id="one-tab" data-toggle="tab" href="?id=1" role="tab" aria-controls="One" aria-selected="false">Доходы/ Расходы</a>
	    </li>
		<li class="nav-item">
	        <a class="nav-link" id="one-tab" data-toggle="tab" href="?id=2" role="tab" aria-controls="One" aria-selected="false">Сальдо</a>
	    </li>
			
			</ul>
		</div>

		ТУТ БУДУТ ДИАГРАМКИ

</div>
</main>
</body>
</html>

