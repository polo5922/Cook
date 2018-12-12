<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cook</title>
    <link rel="stylesheet" media="screen  and (max-width: 640px)"  href="assets/css/phone.css">
    <link rel="stylesheet" media="screen  and (min-width: 640px)"  href="assets/css/destock.css">
    <link rel="stylesheet" href="assets/api/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/api/Materialize/css/materialize.css">

    <script src="assets\api\Jquery\jquery-3.3.1.min.js" charset="utf-8"></script>
    <script src="assets\api\Materialize\js\materialize.js" charset="utf-8"></script>
    <script src="assets/api/bootstrap/js/bootstrap.js" charset="utf-8"></script>
    <script src="https://use.fontawesome.com/d94a7c4cf5.js"></script>
    <script src="https://maps.google.com/maps/api/js?sensor=false" charset="utf-8"></script>
    <script src="assets\js\cc.js" charset="utf-8"></script>
    <script src="assets\js\map.js" charset="utf-8"></script>
  </head>
  <body>
    <script type="text/javascript">
      $(document).ready(function(){
        function bdd(action){
          $.post('backend/bdd.php',
              {
                  action: action
              }, function(data) {
                  console.log(data);
            });
          }
        bdd("init");
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


    <div id="recete">
      <?php
        for($x = 1;$x <= 6;$x++)
        {
          echo "<div class='row'>";
          for($y = 1;$y <= 3;$y++)
          {
            echo "<div class='col-sm-4'>
                    <div class='container_recete'>
                      <div class='recete_box'>
                        <img src='assets/img/ui/blank.png' alt='' class='recete_img'>
                        <span class='recete_title'>Recete n° ".$x*$y."</span>
                      </div>
                    </div>
                  </div>";
          }
          echo "</div>";
        }



      ?>
    </div>
  </body>
</html>
