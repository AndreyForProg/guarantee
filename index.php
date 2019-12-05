<?php
session_start();
define('CSS_PATH', './public/css/');
define('JS_PATH', './public/js/');
include_once 'controler/user.controler.php';
include_once 'controler/admin.controler.php';

if (empty($_GET) && empty($_POST)) {
  userIndex();
}

if (isset($_GET['admin'])) {
  adminIndex();
}

if (isset($_POST['action']) && ($_POST['action'] === 'updatePhone')) {
  update();
}

if (isset($_POST['action']) && ($_POST['action'] === 'addPortfolioImg')) {
  addPortfolio();
}

if (isset($_POST['action']) && ($_POST['action'] === 'addClientImg')) {
  addClient();
}

if (isset($_POST['action']) && ($_POST['action'] === 'dellPortImg')) {
  dellPortfolio();
}

if (isset($_POST['action']) && ($_POST['action'] === 'dellClientImg')) {
  dellClient();
}
?>