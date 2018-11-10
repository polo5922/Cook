// the map
  var map;

  function initialize() {
    var myOptions = {
      zoom: 3,
      center: new google.maps.LatLng(10, 0),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      disableDefaultUI: true
    };

    // initialize the map
    map = new google.maps.Map(document.getElementById('map-canvas'),
        myOptions);

    // these are the map styles
    var styles = [
        {
          stylers: [
            { hue: "#00ffe6" },
            { saturation: -20 }
          ]
        },
        {
          featureType: "landscape",
          stylers: [
            { hue: "#ffff66" },
            { saturation: 100 }
          ]
        },{
          featureType: "road",
          stylers: [
            { visibility: "off" }
          ]
        },{
          featureType: "administrative.land_parcel",
          stylers: [
            { visibility: "off" }
          ]
        },{
          featureType: "administrative.locality",
          stylers: [
            { visibility: "off" }
          ]
        },{
          featureType: "administrative.neighborhood",
          stylers: [
            { visibility: "off" }
          ]
        },{
          featureType: "administrative.province",
          stylers: [
            { visibility: "off" }
          ]
        },{
          featureType: "landscape.man_made",
          stylers: [
            { visibility: "off" }
          ]
        },{
          featureType: "landscape.natural",
          stylers: [
            { visibility: "off" }
          ]
        },{
          featureType: "poi",
          stylers: [
            { visibility: "off" }
          ]
        },{
          featureType: "transit",
          stylers: [
            { visibility: "off" }
          ]
        }
      ];

    map.setOptions({styles: styles});

    // Initialize JSONP request
    var script = document.createElement('script');
    var url = ['https://www.googleapis.com/fusiontables/v1/query?'];
    url.push('sql=');
    var query = 'SELECT name, kml_4326 FROM ' +
        '1foc3xO9DyfSIF6ofvN0kp2bxSfSeKog5FbdWdQ';
    var encodedQuery = encodeURIComponent(query);
    url.push(encodedQuery);
    url.push('&callback=drawMap');
    url.push('&key=AIzaSyAm9yWCV7JPCTHCJut8whOjARd7pwROFDQ');
    script.src = url.join('');
    var body = document.getElementsByTagName('body')[0];
    body.appendChild(script);
  }

  function drawMap(data) {
    var rows = data['rows'];
    for (var i in rows) {
      if (rows[i][0] != 'Antarctica') {
        var newCoordinates = [];
        var geometries = rows[i][1]['geometries'];
        if (geometries) {
          for (var j in geometries) {
            newCoordinates.push(constructNewCoordinates(geometries[j]));
          }
        } else {
          newCoordinates = constructNewCoordinates(rows[i][1]['geometry']);
        }
        var country = new google.maps.Polygon({
          paths: newCoordinates,
          strokeColor: '#ff9900',
          strokeOpacity: 1,
          strokeWeight: 0.3,
          fillColor: '#ffff66',
          fillOpacity: 0,
          name: rows[i][0]
        });
        google.maps.event.addListener(country, 'mouseover', function() {
          this.setOptions({fillOpacity: 0.4});
        });
        google.maps.event.addListener(country, 'mouseout', function() {
          this.setOptions({fillOpacity: 0});
        });
        google.maps.event.addListener(country, 'click', function() {
          console.log(this.name);
          console.log(getCountryCode(this.name));
          var cc = getCountryCode(this.name);
          var flag = "<img src='https://www.countryflags.io/" + cc + "/flat/64.png'>";
          console.log(flag);
          $(".flag").html(flag);
        });

        country.setMap(map);
      }
    }
  }

  function constructNewCoordinates(polygon) {
    var newCoordinates = [];
    var coordinates = polygon['coordinates'][0];
    for (var i in coordinates) {
      newCoordinates.push(
          new google.maps.LatLng(coordinates[i][1], coordinates[i][0]));
    }
    return newCoordinates;
  }
  var mapStat = -1;
  google.maps.event.addDomListener(window, 'load', initialize);
  $( document ).ready(function() {
        $("#map-canvas").hide();
        $(".btn-map").show();

        $(".btn-map").click(function(e){
          mapStat = mapStat * -1;
          if(mapStat == 1){
            $("#map-canvas").slideDown(1000);
            $(".down").removeClass("down").addClass("up");
            $(".fa-chevron-down").removeClass("fa-chevron-down").addClass("fa-chevron-up");
            $(".globe-down").removeClass("globe-down").addClass("globe-up");
          }else{
            $("#map-canvas").slideUp(1000);
            $(".up").removeClass("up").addClass("down");
            $(".fa-chevron-up").removeClass("fa-chevron-up").addClass("fa-chevron-down");
            $(".globe-up").removeClass("globe-up").addClass("globe-down");
          }
          console.log(mapStat);

        });

  });
