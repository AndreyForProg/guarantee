<?php
session_start();
define('CSS_PATH', './public/css/');
define('JS_PATH', './public/js/');
include_once 'controler/user.controler.php';
include_once 'controler/admin.controler.php';
// print_r($_POST);

if (empty($_GET) && empty($_POST)) {
  userIndex();
}

if (isset($_GET['action']) && ($_GET['action'] === 'add6Imgs')) {
  userIndex($_GET['data']);
}

if (isset($_GET['admin'])) {
  adminIndex();
}

//редактируем контактные данные
if (isset($_POST['action']) && ($_POST['action'] === 'updatePhone')) {
  update();
}

//удаление картинки портфолио
if (isset($_POST['action']) && ($_POST['action'] === 'dellPortImg')) {
  dellImgs();
}

//удаление картинки клиента
if (isset($_POST['action']) && ($_POST['action'] === 'dellClientImg')) {
  dellImgs();
}

//добавление картинки
if (isset($_GET['add']) && ($_FILES['userfile']['tmp_name'] != '')) {
  addImgs();
}
?>