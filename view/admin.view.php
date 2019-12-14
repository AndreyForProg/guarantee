<?php

?>

<head>
  <meta charset    = "UTF-8">
  <meta name       = "viewport" content        = "width=device-width, initial-scale=1.0">
  <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
  <title>Admin</title>
  <link rel = "stylesheet" href = "http://guarantee.loc/public/css/admin.css">
  <script src="../public/js/jquery.js"></script>
</head>
<body>

<div class="wrapper">

  <div class="enter_Andmin">

    <label for="password">пароль</label>
    <input type="password" id="password">
    <button id='btnEnter'>Войти</button>
    <div class="errorMessage">не правильный пароль</div>

  </div>

  <div class="content_Admin">

    <button id="exit">выйти</button>

    <div class="titles">
      <button class="title">контактные данные</button>
      <button class="title">портофолио</button>
      <button class="title">список клиентов</button>
    </div>

    <div class="content">
      <div class="content_contacts">
        <div class="data">
          <div class="label">телефон</div>
          <input type="phone" class="dataItem" value="<?php echo $data[0]['phone']?>">
          <input type="button" value="опубликовать" class="updateBtn phone">
        </div>

        <div class="data">
          <div class="label">vk</div>
          <input type="text" class="dataItem" value="<?php echo $data[0]['vk']?>">
          <input type="button" value="опубликовать" class="updateBtn vk">
        </div>

        <div class="data">
          <div class="label">instagram</div>
          <input type="text" class="dataItem" value="<?php echo $data[0]['inst']?>">
          <input type="button" value="опубликовать" class="updateBtn inst">
        </div>

        <div class="data">
          <div class="label">mail</div>
          <input type="text" class="dataItem" value="<?php echo $data[0]['mail']?>">
          <input type="button" value="опубликовать" class="updateBtn mail">
        </div>
        <div class="status">Данные опубликованы</div>
      </div>


      <div class="portfolio">
        <h3 class="title">Портофолио</h3>

      <!-- добавляем картинку в портфолио -->
        <form class="add" action="index.php?add" method="POST" enctype="multipart/form-data">
          <input type="file" name="userfile[]" multiple="">
          <input type="submit" name="portfolio" class="addPortBtn" value="добавить файл">
        </form>

        <!-- выборка всех картиок -->
        <div class="allItems">
          <?php foreach ($getPortfolioImgs as $key => $value) { ?>
              <div class="portfolio_item" id="<?php echo $getPortfolioImgs[$key]['name']; ?>">
                <img     src   = "../public/images/my<?php echo $getPortfolioImgs[$key]['name'];?>" alt = "">
                <input type="hidden" value="<?php echo $getPortfolioImgs[$key]['name'];?>" class="valuePortImg">
                <button class="delPortfolioImg">удалить</button>
              </div>
            <?php } ?>
        </div>
      </div>

      <!-- добавляем картинку клиента -->
      <div class="clients">
        <h3 class="title">Список клиентов</h3>
        <form class="add" action="index.php?add" method="POST" enctype="multipart/form-data">
          <input type="file" name="userfile[]" multiple="">
          <input type="submit" name="clients" class="addClientBtn" value="добавить файл">
        </form>

        <!-- выборка всех картиок -->
        <div class="allItems">
          <?php foreach ($getClientsImgs as $key => $value) { ?>
              <div class="client_item" id="<?php echo $getClientsImgs[$key]['name']; ?>">
                <img     src   = "../public/images/my<?php echo $getClientsImgs[$key]['name'];?>" alt = "">
                <input type="hidden" value="<?php echo $getClientsImgs[$key]['name'];?>" class="valueClientImg">
                <button class="delClientImg">удалить</button>
              </div>
            <?php } ?>
        </div>
      </div>

  </div>
</div>
<script src="../public/js/index.js"></script>
</body>
