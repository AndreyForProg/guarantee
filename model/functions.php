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
}


//добавить картинку портфоли в БД
function addImg() {
  global $bd;
  if ($_FILES['userfile']['tmp_name'] != '') {
    echo '<h3>загруженные картинки:</h3>';
    $count = count($_FILES['userfile']['name']);
    //определяем как будет называться группа картинки
    if (isset($_POST['portfolio']) && ($_POST['portfolio'] === 'добавить файл')) {
      $direct = 'portfolio'; // название колонки в БД
    } else if (isset($_POST['clients']) && ($_POST['clients'] === 'добавить файл')) {
      $direct = 'clients';
    }
    for ($i = 0; $i < $count; $i++) {
      $filePath  = $_FILES['userfile']['tmp_name'][$i];
      $errorCode = $_FILES['userfile']['error'][$i];
        // Проверим на ошибки
      if (!is_uploaded_file($filePath)) {
        // Массив с названиями ошибок
        $errorMessages = [
            UPLOAD_ERR_INI_SIZE   => 'Размер файла превысил значение upload_max_filesize в конфигурации PHP.',
            UPLOAD_ERR_FORM_SIZE  => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE в HTML-форме.',
            UPLOAD_ERR_PARTIAL    => 'Загружаемый файл был получен только частично.',
            UPLOAD_ERR_NO_FILE    => 'Файл не был загружен.',
            UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка.',
            UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск.',
            UPLOAD_ERR_EXTENSION  => 'PHP-расширение остановило загрузку файла.',
        ];
        // Зададим неизвестную ошибку
        $unknownMessage = 'При загрузке файла произошла неизвестная ошибка.';
        // Если в массиве нет кода ошибки, скажем, что ошибка неизвестна
        $outputMessage = isset($errorMessages[$errorCode]) ? $errorMessages[$errorCode] : $unknownMessage;
        // Выведем название ошибки
        die($outputMessage);
      }
      // Создадим ресурс FileInfo
      $fi = finfo_open(FILEINFO_MIME_TYPE);
      // Получим MIME-тип
      $mime = (string)finfo_file($fi, $filePath);
      // Проверим ключевое слово image (image/jpeg, image/png и т. д.)
      if (strpos($mime, 'image') === false) die ('Можно загружать только изображения.');
      // Зададим ограничения для картинок
      $limitBytes  = 1024 * 1024 * 5;
      // $limitWidth  = 1280;
      // $limitHeight = 768;
      // Проверим нужные параметры
      if (filesize($filePath) > $limitBytes) die('Размер изображения не должен превышать 5 Мбайт.');
      $name = md5_file($filePath) . '.jpg';
      // Переместим картинку с новым именем и расширением в папку /images и БД
      if (!move_uploaded_file($filePath, './public/images/' . $name)) {
          die('При записи изображения на диск произошла ошибка.');
      } else {
        $query = $bd->prepare("INSERT INTO `images`(`grup`, `name`) VALUES ('$direct','$name')");
        $query->execute();
      }
      $orgfile = './public/images/' . $name; //картинка которую будем изменять
      switch ($_FILES['userfile']['type'][$i]) { //узнаем тип картинки
        case "image/gif": $nImg = imagecreatefromgif($orgfile); break;
        case "image/jpeg": $nImg = imagecreatefromjpeg($orgfile); break;
        case "image/png": $nImg = imagecreatefrompng($orgfile); break;
        case "image/pgpeg": $nImg = imagecreatefromgif($orgfile); break;
      }
      list($w, $h) = getimagesize($orgfile);
      $newW = $w * 0.25;
      $newH = $h * 0.25;
      $newName = './public/images/my' . $name; //название новой картинки

      if ($direct = 'clients') {
        $truecolor = imagecreatetruecolor('280', '150'); //длина и ширина новой картинки
        imagecopyresampled($truecolor, $nImg, 0,0,0,0, '280', '150', $w, $h);
      } else {
        $truecolor = imagecreatetruecolor('360', '320'); //длина и ширина новой картинки
        imagecopyresampled($truecolor, $nImg, 0,0,0,0, '360', '320', $w, $h);
      }

      imagejpeg($truecolor, $newName, 100);
      unlink($orgfile); //удаление старой картинки с папки
      echo '<img src="' . $newName .'">';
    }
    echo '<br>';
    echo '<a href="index.php?admin"><h4> назад </h4></a>';
  }
}


//выбрать всех картинки клиентов
function getClientsImgs() {
  global $bd;
  $sql = $bd->query("SELECT * FROM images WHERE grup = 'clients' ORDER BY id DESC");
  return mysqli_fetch_all($sql, MYSQLI_ASSOC);
}


//выбрать всех картинки портфолио
function getPortfolioImg() {
  global $bd;
  $sql = $bd->query("SELECT * FROM images WHERE grup = 'portfolio' ORDER BY id DESC");
  return mysqli_fetch_all($sql, MYSQLI_ASSOC);
}


//удалить картинку
function dellImg() {
  global $bd;
  $sql = $bd->query("DELETE FROM images WHERE `name` = '". $_POST['data'] ."'");
  if ($sql == false) {
    echo "ошибка подключения";
  } else {
    echo "данные удалены";
    $delFile = $_POST['data'];
    unlink('public/images/my' . $delFile);
  }
}
