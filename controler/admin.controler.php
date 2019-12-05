<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/model/functions.php';

  function adminIndex() {
    $data = dataGet();
    $getPortfolioImgs = getPortfolioImgs();
    $getClientsImgs = getClientsImgs();
    include $_SERVER['DOCUMENT_ROOT'] . '/view/admin.view.php';
  }

  function update() {
    updateData();
  }

  function addPortfolio() {
    addPortfolioImg();
  }

  function addClient() {
    addClientImg();
  }

  function dellPortfolio() {
    dellPortImg();
  }

  function dellClient() {
    dellClientImg();
  }