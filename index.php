<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cook ATiPique</title>
    <link rel="stylesheet" href="assets/api/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/api/Materialize/css/materialize.css">
    <link rel="stylesheet" media="screen  and (max-width: 640px)"  href="assets/css/phone.css">
    <link rel="stylesheet" media="screen  and (min-width: 640px)"  href="assets/css/destock.css">

    <script src="assets\api\Jquery\jquery-3.3.1.min.js" charset="utf-8"></script>
    <script src="assets\api\Materialize\js\materialize.js" charset="utf-8"></script>
    <script src="assets/api/bootstrap/js/bootstrap.js" charset="utf-8"></script>
    <script src="https://use.fontawesome.com/d94a7c4cf5.js"></script>
    <script src="https://maps.google.com/maps/api/js?sensor=false" charset="utf-8"></script>
    <script src="assets\js\cc.js" charset="utf-8"></script>
    <script src="assets\js\map.js" charset="utf-8"></script>
    <script src="assets\js\bdd.js" charset="utf-8"></script>
    <script src="assets\js\coutry_input.js" charset="utf-8"></script>
    <script src="assets\js\dif_input.js" charset="utf-8"></script>
  </head>
  <body>
    <script type="text/javascript">
      $(document).ready(function(){
        $(".window").hide();
        $(".float").click(function(){
          $(".window").show(500);
        });
        $(".close-window").click(function(){
          $(".window").hide(500);
        });
        bdd("init");
        //bdd("get","test");
      });
    </script>
    <div class="top">
      <img src="assets\img\ui\icon.svg" class="icon">
      <div class="coutry_container">
        <div class="flag">
        </div>
          <h3 style="color:white" class="country"></h3>
      </div>
    </div>

    <div class="map-container">
      <div class="map">
        <div id="map-canvas"></div>
        <div class="btn-map">
          <i class="fa fa-chevron-down down fa-3x" aria-hidden="true"></i>
          <i class="fa fa-globe globe-down fa-2x" aria-hidden="true"></i>
        </div>
      </div>
    </div>

    <div id="recette">
      <?php
        for($x = 1;$x <= 6;$x++)
        {
          echo "<div class='row'>";
          for($y = 1;$y <= 3;$y++)
          {
            echo "<div class='col-sm-4'>
                    <div class='container_recette'>
                      <div class='recette_box'>
                        <img src='assets/img/ui/blank.png' alt='' class='recette_img'>
                        <span class='recette_title'>Recette n° ".$x*$y."</span>
                      </div>
                    </div>
                  </div>";
          }
          echo "</div>";
        }



      ?>
    </div>
      <div class="float">
        <i class="fa fa-plus my-float"></i>
      </div>
      <div class="window">
        <i class="fa fa-close fa-3x close-window"></i>
        <div class="title">
          <h3 style="position:relative;left:6%;padding:0px;margin:0px;width:300px;margin-top:20px;margin-bottom:20px;">Title</h3>
        </div>
        <div class="content">
          <img style="position:absolute;padding:0px;left:30px;border-radius:10px" src="assets/img/ui/blank.png" alt="">
          <div class="pic-container">
          <ul id="img_list">
            <li><img style="border-radius:10px;" src="assets/img/ui/blank.png" alt=""></li>
            <li><img style="border-radius:10px;" src="assets/img/ui/blank.png" alt=""></li>
            <li><img style="border-radius:10px;" src="assets/img/ui/blank.png" alt=""></li>
            <li><img style="border-radius:10px;" src="assets/img/ui/blank.png" alt=""></li>
          </ul>
        </div>
          <div style="position:absolute;top:50%;width:50%;">
            <input type="text" name="Title" value="" placeholder="Title">
            <textarea name="name" rows="8" cols="100" placeholder="Desc"></textarea>
          </div>
          <div style="position:absolute;top:50%;width:50%;left:50%;">
            <span>dificulte</span>
            <ul>
              <li class="dif">
                <div class="diff-block"></div>
              </li>
              <li class="dif">
                <div class="diff-block"></div>
              </li>
              <li class="dif">
                <div class="diff-block"></div>
              </li>
              <li class="dif">
                <div class="diff-block"></div>
              </li>
            </ul>

            <br>
            <span for="coutry_input">pays</span>
            <select id="coutry_input" class="" name="">
              <option class="icons" disabled selected>Choose your option</option>
              <?php
              $url = 'https://restcountries.eu/rest/v2/all'; // path to your JSON file
              $data = file_get_contents($url); // put the contents of the file into a variable
              $countries = json_decode($data); // decode the JSON feed
              foreach ($countries as $countrie) {
                echo '<option data-icon="'.$countrie->flag.'" value="'.$countrie->alpha2Code.'">'.$countrie->name.'</option>';
              }


                ?>
            </select>
            <br>
            <span>ingerdient</span>
            <br>
            <span>duree</span>
          </div>
          <div id="button_add">

          </div>
        </div>
      </div>
  </body>
</html>
