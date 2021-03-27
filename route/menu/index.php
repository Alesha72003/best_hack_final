<?php
 require_once $_SERVER['DOCUMENT_ROOT'] . '/template/header.php';

 $connection  = db\getConnection();
 $id          = $_SESSION['id'];
 $query       = "SELECT name, surname, patronymic FROM users WHERE id = $id ";
 $result      =  mysqli_query($connection, $query);
 $user        = mysqli_fetch_assoc($result);


// Обработка запроса на удаление конфигурации симуляции

 if(isset($_POST['delete'])) {
  $confID   = $_POST['id'];
  $result   =  mysqli_query($connection, "DELETE FROM simulations WHERE (`id` = '$confID')");
 }

// Запуск конфигурации - запись в сесиию начала симуляции 

 if(isset($_POST['starter'])) {
  $_SESSION['config-id'] = $_POST['id'];
 }

?>

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
      <div class="col-md-9"><h1 class="main-title">Конфигурации симуляций<br></h1></div>
      <div class="col-md-3"><a id="create_conf" href="/route/create_conf"><p>Создать конфигурацию <i class="fa fa-plus-square" aria-hidden="true"></i> </p></a></div>
    </div>

    <div>
      <form method="POST" action="/route/menu/">
        <input style="display: none;" type="text" name="id" value="<?= $_GET['id']??"" ?>">
        <input class="btn btn-primary mt-3 " style="background-color: #D1243C; border:none;" type="submit" name="delete" value="Удалить выбранную конфигурацию ">
      </form>
      <form id="run" method="POST" action="/route/menu/">
        <input style="display: none;" type="text" name="id" value="<?= $_GET['id']??"" ?>">
        <input type="text" class="btn btn-primary mt-3 " id="buttonrun" style="background-color: green; border:none;" name="starter" value="Запустить выбранную конфигурацию">
      </form>
    </div>

<script>
    function setCookie(name, value, options = {}) {

      options = {
        path: '/',
        // при необходимости добавьте другие значения по умолчанию
        ...options
      };

      if (options.expires instanceof Date) {
        options.expires = options.expires.toUTCString();
      }

      let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);

      for (let optionKey in options) {
        updatedCookie += "; " + optionKey;
        let optionValue = options[optionKey];
        if (optionValue !== true) {
          updatedCookie += "=" + optionValue;
        }
      }

      document.cookie = updatedCookie;
    }
    
    function startSim() {
        simid = (new URLSearchParams(window.location.search)).get("id");
        if (simid == null) {
            return;
        }
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/logics/startSimulation?simid=' + simid, false);
        xhr.send();
        if (xhr.status != 200) {
          // обработать ошибку
          alert( xhr.status + ': ' + xhr.statusText ); // пример вывода: 404: Not Found
          return;
        }
        idrun = JSON.parse(xhr.responseText).id;
        setCookie("idrun", idrun);
        document.getElementById("run").submit();
    }
    document.getElementById("buttonrun").onclick = startSim;
</script>


<?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/template/configPrint.php' ?>
<?php if(isset($_GET['id'])) require_once $_SERVER['DOCUMENT_ROOT'] . '/template/config_params_print.php' ?>
<?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/template/footer.php' ?>





