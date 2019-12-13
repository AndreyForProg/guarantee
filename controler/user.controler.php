<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/model/functions.php';

  function userIndex() {
    $data = dataGet();
    $portfolioImages = getPortfolioImg();
    $clientsImages = getClientsImgs();
    include $_SERVER['DOCUMENT_ROOT'] . '/view/user.view.php';
    $_SESSION['error'] = '';
    $_SESSION['status'] = '';
    return $portfolioImages;
  }