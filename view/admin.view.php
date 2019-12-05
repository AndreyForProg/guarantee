<?php

?>

<head>
  <meta charset    = "UTF-8">
  <meta name       = "viewport" content        = "width=device-width, initial-scale=1.0">
  <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
  <title>Admin</title>
  <link rel = "stylesheet" href = "../public/css/admin.css">
  <script src="../public/js/jquery.js"></script>
</head>

<div class="wrapper">

  <div class="enter_Andmin">

    <label for="password">пароль</label>
    <input type="password" id="password">
    <button id='btnEnter'>Войти</button>
    <div class="errorMessage"></div>

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
      </div>

    <div class="status"></div>

      <div class="portfolio">
        <h3 class="portfolio_title">Портофолио</h3>

      <!-- добавляем картинку в портфолио -->
        <div class="add">
          <input type="button" class="addPortBtn" value="добавить картинку">
          <div class="portStatus"></div>
        </div>

        <!-- выборка всех картиок -->
        <div class="allItems">
          <?php foreach ($getPortfolioImgs as $key => $value) { ?>
              <div class="portfolio_item" id="<?php echo $getPortfolioImgs[$key]['img']; ?>">
                <img     src   = "../public/<?php echo $getPortfolioImgs[$key]['img'];?>" alt = "">
                <input type="hidden" value="<?php echo $getPortfolioImgs[$key]['img'];?>" class="valuePortImg">
                <button class="delPortfolioImg">удалить</button>
              </div>
            <?php } ?>
        </div>
      </div>

      <!-- добавляем картинку клиента -->
      <div class="clients">
        <h3 class="title">список клиентов</h3>
        <div class="add">
          <input type="text" class="addClientInp">
          <input type="button" class="addClientBtn" value="добавить картинку">
          <div class="clientStatus"></div>
        </div>

        <!-- выборка всех картиок -->
        <div class="allItems">
          <?php foreach ($getClientsImgs as $key => $value) { ?>
              <div class="client_item" id="<?php echo $getClientsImgs[$key]['img']; ?>">
                <img     src   = "../public/<?php echo $getClientsImgs[$key]['img'];?>" alt = "">
                <input type="hidden" value="<?php echo $getClientsImgs[$key]['img'];?>" class="valueClientImg">
                <button class="delClientImg">удалить</button>
              </div>
            <?php } ?>
        </div>
      </div>

  </div>
</div>
<script src="../public/js/index.js"></script>