<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/bd/bd.php';

//вывести все данные
function dataGet() {
  global $bd;
  $sql = $bd->query("SELECT * FROM contacts");
  return mysqli_fetch_all($sql, MYSQLI_ASSOC);
}

//изменить в БД контактные данные
function updateData() {
  global $bd;
  $sql = $bd->query("UPDATE contacts SET {$_POST['type']} = '". $_POST['data'] ."' WHERE id = 1");
  return mysqli_fetch_all($sql, MYSQLI_ASSOC);
}

//добавить картинку портфоли в БД
function addPortfolioImg() {
  global $bd;
  $addImg = "INSERT INTO portfolio (img) VALUES ('". $_POST['data'] ."')";
  $query = mysqli_query($bd, $addImg);
  return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

//добавить картинку клиента в БД
function addClientImg() {
  global $bd;
  $addImg = "INSERT INTO clients (img) VALUES ('". $_POST['data'] ."')";
  $query = mysqli_query($bd, $addImg);
  return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

//выбрать всех картинки портфолио
function getPortfolioImgs() {
  global $bd;
  $sql = $bd->query("SELECT * FROM portfolio ORDER BY id DESC");
  return mysqli_fetch_all($sql, MYSQLI_ASSOC);
}

//выбрать всех картинки клиентов
function getClientsImgs() {
  global $bd;
  $sql = $bd->query("SELECT * FROM clients ORDER BY id DESC");
  return mysqli_fetch_all($sql, MYSQLI_ASSOC);
}

//удалить портфолио картинку
function dellPortImg() {
  global $bd;
  $sql = $bd->query("DELETE FROM portfolio WHERE img = '". $_POST['data'] ."'");
  if ($sql == false) {
    echo "ошибка подключения";
  } else {
    echo "данные удалены";
  }
}

// удалить клиента картинку
function dellClientImg() {
  global $bd;
  $sql = $bd->query("DELETE FROM clients WHERE img = '". $_POST['data'] ."'");
  if ($sql == false) {
    echo "ошибка подключения";
  } else {
    echo "данные удалены";
  }
}