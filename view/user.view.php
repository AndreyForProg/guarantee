<?php
echo '<pre>';
var_dump($portfolioImages);
?>
<!DOCTYPE html>
<html lang = "en">
<head>
  <meta charset    = "UTF-8">
  <meta name       = "viewport" content        = "width=device-width, initial-scale=1.0">
  <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
  <title>Guarantee</title>
  <link rel = "stylesheet" href = "../public/css/index.css">
  <script src="../public/js/jquery.js"></script>
</head>
<body>

  <header>
    <div class = "nomber">
      <img src = "../public/images/phone.png" alt = "phone">
      +7   (918) <span class = "phone_nomber__large"><? echo $data[0]['phone'] ?></span>
    </div>
  </header>

  <div class = "container">

      <!-- список предложений -->
      <section class = "navBar">
        <div     class = "navBar_item">
          <img     src   = "../public/images/nav1.png" alt = "">
          <div     class = "text">баннеры</div>
        </div>

        <div class = "navBar_item">
          <img src   = "../public/images/navA.png" alt = "">
          <div class = "text">
            обьемные<br>буквы
          </div>
        </div>

        <div class = "navBar_item">
          <img src   = "../public/images/navI.png" alt = "">
          <div class = "text">световые<br>вывески</div>
        </div>

        <div class = "navBar_item">
          <img src   = "../public/images/nav4.png" alt = "">
          <div class = "text">штендеры<br>стелы</div>
        </div>

        <div class = "navBar_item">
          <img src   = "../public/images/nav5.png" alt = "">
          <div class = "text">стенды<br>таблички</div>
        </div>
      </section>

      <!-- о компании -->
      <section class = "about">
        <button  class = "btn">о компании</button>
        <div     class = "about_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum suscipit itaque eum aliquam odit autem quos, sed at quis impedit accusantium ipsam atque fuga expedita omnis amet. Ab a soluta architecto sequi illo. Illum exercitationem, error ullam assumenda officia perspiciatis accusamus unde repudiandae deleniti pariatur, inventore tempore? Hic nemo quas dolore quos fugit, aperiam quisquam deserunt qui quae tenetur ipsum omnis distinctio necessitatibus ipsa explicabo nostrum provident doloribus magni cum rerum unde debitis soluta ab. Aliquam eligendi qui maxime odit commodi pariatur velit ducimus ea inventore. Soluta reiciendis pariatur nesciunt ipsam rem delectus voluptatem, magnam maxime inventore, molestiae ullam eos? Voluptatum, reprehenderit unde nemo magni quos fuga corporis vero maiores eaque sapiente id qui, voluptates minima consequuntur. Rem eligendi cupiditate non ex iste obcaecati quia maxime ipsum laborum debitis aut repudiandae doloremque tempore est sapiente excepturi, maiores neque blanditiis nesciunt dolore, quae qui. Adipisci sapiente tempore facilis fuga a dicta atque laborum sed maiores, soluta assumenda, ab ut animi corporis quis repudiandae sequi fugit eum libero quaerat dolores voluptatibus debitis magnam at? Eum eos expedita doloremque deserunt deleniti ducimus atque, a laboriosam eveniet, debitis aliquid fugit voluptas blanditiis quod inventore. Maiores numquam atque minima enim, quam possimus praesentium excepturi dolorem!</div>
      </section>

      <!-- портфолио -->
      <section class = "portfolio">
        <button  class = "btn">портфолио</button>
        <div     class = "portfolio_images">

          <?php foreach($portfolioImages as $kay => $value) {?>
          <div     class = "portfolio_image">
            <img     src   = "../public/images/my<?php echo $portfolioImages[$kay]['name'];?>" alt = "">
          </div>
          <?php }; ?>

        </div>

        <div class = "whatch_more">смотреть еще</div>
      </section>

      <!-- список клиентов -->
      <section class = "clients">
        <button  class = "btn">наши клиенты</button>
        <div     class = "clients_images">

          <?php foreach($clientsImages as $key => $value) {?>
            <div     class = "client_image">
              <img     src   = "../public/images/my<?php echo $clientsImages[$key]['name'];?>" alt = "">
            </div>
          <?php } ?>

      </section>

    <footer>
      <div class="center_footer">

        <div class = "footer_item">
          <img src   = "../public/images/vk.png" alt = "">
          <div class = "footer_item__text"><a href="#"><? echo $data[0]['vk'] ?></a></div>
        </div>
        <div class = "footer_item">
          <img src   = "../public/images/inst.png" alt = "">
          <div class = "footer_item__text"><a href="#"><? echo $data[0]['inst'] ?></a></div>
        </div>
        <div class = "footer_item">
          <img src   = "../public/images/phone_footer.png" alt = "">
          <div class = "footer_item__text"><? echo $data[0]['phone'] ?></div>
        </div>
        <div class = "footer_item">
          <img src   = "../public/images/mail.png" alt = "">
          <div class = "footer_item__text"><? echo $data[0]['mail'] ?></div>
        </div>

      </div>
    </footer>
  </div>

  <script src="../public/js/user.js"></script>
</body>
</html>