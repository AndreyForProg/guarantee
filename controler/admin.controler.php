<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/model/functions.php';

  function adminIndex() {
    $data = dataGet();
    $getPortfolioImgs = getPortfolioImg();
    $getClientsImgs = getClientsImgs();
    include $_SERVER['DOCUMENT_ROOT'] . '/view/admin.view.php';
  }

  //изменить контактные данные
  function update() {
    updateData();
  }

  //добавить картинку
  function addImgs() {
    addimg();
  }

  //удалить картинку
  function dellImgs() {
    dellImg();
  }
