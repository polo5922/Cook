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
        $(".window-add").hide();
        $(".window").hide();
        $(".float").click(function(){
          $(".window-add").show(500);
        });
        $(".close-window").click(function(){
          $(".window").hide(500);
        });
        $(".close-window-add").click(function(){
          $(".window-add").hide(500);
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

    <div class="recette">
      <?php

          echo "<div class='row'>";
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "cook";

          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }

          $sql = "SELECT id FROM recette";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                $id=$row["id"];
                $sql2 = "SELECT lien FROM img WHERE Recette_id=$id";
                $sql3 = "SELECT Nom From recette WHERE id=$id";
                echo "<div class='col-sm-4'>
                <div onclick='recette(".$row["id"].")' style='cursor:pointer' class='container_recette'>
                <div class='recette_box'>
                ";

                $result2 = $conn->query($sql2);
                while($row2 = $result2->fetch_assoc()){
                  echo "<img src='assets/img/recette/".$row2["lien"]."' alt='' class='recette_img'>";
                }

                $result3 = $conn->query($sql3);
                while($row3 = $result3->fetch_assoc()){
                  echo "<span class='recette_title'>".$row3["Nom"]."</span>";
                }

                echo "</div>
                      </div>
                      </div>";
              }
          } else {
              echo "0 results";
          }
          $conn->close();


          echo "</div>";

      ?>
      <script type="text/javascript">
      function recette(id){
        $(".recette-"+id).show(500);
        console.log(id);
      }
      </script>
    </div>
      <div class="float">
        <i class="fa fa-plus my-float"></i>
      </div>
      <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cook";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT id, Nom, description,difficultee FROM recette";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $id=$row["id"];
              $sql2 = "SELECT lien FROM img WHERE Recette_id=$id";
              echo "<div class='window recette-";
              echo $row['id'];
              echo "'>
              <i class='fa fa-close fa-3x close-window'></i>";
              echo "<div class='title'>
                <h3 style='position:relative;left:6%;padding:0px;margin:0px;width:300px;margin-top:20px;margin-bottom:20px;'>".$row["Nom"]."</h3>
              </div>
              <div class='content'>";
              echo "<p class='diff_recette'> difficultée de la recette : ";
              echo $row['difficultee'];
              echo "/4</p>";
              echo "<p class='desc_recette'>";
              echo $row['description'];
              echo "</p>";

              $result2 = $conn->query($sql2);
              while($row2 = $result2->fetch_assoc()){
                echo "<img style='position:absolute;padding:0px;left:30px;border-radius:10px;width:50%;height:50%;' src='assets/img/recette/".$row2["lien"]."' alt=''>";
              }
              echo "</div>";
              echo "</div>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
      <div class="window-add">
        <i class="fa fa-close fa-3x close-window-add"></i>
        <div class="title">
          <h3 style="position:relative;left:6%;padding:0px;margin:0px;width:300px;margin-top:20px;margin-bottom:20px;">Add recette</h3>
        </div>
        <div class="content">
        <label for="file-input">
          <img style="position:absolute;padding:0px;left:30px;border-radius:10px" src="assets/img/ui/blank.png" alt="">
        </label>
        <input multiple type="file" id="file-input" style="display:none;" name="" value="">
          <div class="pic-container">
          <ul id="img_list">

          </ul>
        </div>
          <div style="position:absolute;top:60%;width:50%;">
            <input id="title_add" type="text" name="Title" value="" placeholder="Title">
            <textarea id="desc_add" name="name" rows="30" cols="100" placeholder="Desc"></textarea>
          </div>
          <div style="position:absolute;top:60%;width:50%;left:50%;">
            <span>dificulte</span>
            <ul>
              <li class="dif">
                <div class="diff-block-0"></div>
              </li>
              <li class="dif">
                <div class="diff-block-1"></div>
              </li>
              <li class="dif">
                <div class="diff-block-2"></div>
              </li>
              <li class="dif">
                <div class="diff-block-3"></div>
              </li>
            </ul>
            <input type="text" class="dif-value" name="dif" value="3" style="display:none;">
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
            <!--<span>ingerdient</span>
            <br>
            <span>duree</span>
            <br>
              <span></span>
              <genre></genre>
            </br>
          -->
          </div>
          <button type="button" name="button" style="position:absolute;top:90%;left: 90%;;" id="button_add">Valider</button>
        </div>
      </div>
      <script type="text/javascript">
        function handleFileSelect(evt) {
          $("#img-preview").remove();
          var files = evt.target.files; // FileList object

          // Loop through the FileList and render image files as thumbnails.
          for (var i = 0, f; f = files[i]; i++) {

            // Only process image files.
            if (!f.type.match('image.*')) {
              continue;
            }

            var reader = new FileReader();

            // Closure to capture the file information.
            reader.onload = (function(theFile) {
              return function(e) {
                var html = '<li id="img-preview"><img style="border-radius:10px;" src="'+e.target.result+'" alt=""></li>';
                $("#img_list").append(html);
              };
            })(f);

            // Read in the image file as a data URL.
            reader.readAsDataURL(f);
          }
        }

        document.getElementById('file-input').addEventListener('change', handleFileSelect, false);
      </script>

      <script type="text/javascript">
        $("#button_add").click(function(){
          var property = document.getElementById('file-input').files[0];
          var image_name = property.name;
          var image_extension = image_name.split('.').pop().toLowerCase();
          if(jQuery.inArray(image_extension, ['gif','png','jpg','jpeg']) == -1)
          {
            alert('invalid image type');
          }
          var image_size = property.size;
          if(image_size > 20000000000000000000000000000000000000)
          {
            alert('image is to big');
          }
          else
          {
            console.log(property);
            var desc = $("#desc_add").val();
            console.log(desc);
            if(desc == null){
              alert("la description est vide");
            }
            var title = $("#title_add").val();
            console.log(title);
            if(title == null){
              alert("le titre est vide");
            }
            var diff = $(".dif-value").val();
            console.log(diff);
            if (diff == null) {
              alert("il n'y a pas de difficultée selectionée");
            }

            var country = $("#coutry_input").val();
            if(country == null){
              alert("il n'y a pas de pays selectionée")
            }
              var form_data = new FormData();
              form_data.append("file", property);
              form_data.append("title",title);
              form_data.append("desc",desc);
              form_data.append("diff",diff);
              form_data.append("country",country);
              form_data.append("action","add_recette");
              if(desc != null){
                if(title != null){
                  if(country != null){
                    if(diff != null){
                      if(property != null){
                        $.ajax({
                          url: "backend/bdd.php",
                          method: "POST",
                          data: form_data,
                          contentType:false,
                          cache:false,
                          processData:false,
                          success:function(data)
                          {
                            $("#result_reqst").html(data);

                            //$("#evenement_container").remove();
                            //$("#evenement_cc").html(data);
                          }
                        })
                      }
                    }
                  }

                }
              }
          }
        });







      </script>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <p id="result_reqst"></p>
  </body>
</html>
