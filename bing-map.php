<?php
session_start();
if (!empty($_SESSION["name"])) {
  $name = $_SESSION["name"];
} else {
  session_unset();
  $url = "./login.php";
  header("Location: $url");
}
session_write_close() ?>
<?php
if(isset($_GET['address'])){
  
?>
 <script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
      <script type='text/javascript'>
    var map, loc;

    function GetMap(title, loc1, loc2) {
        loc = new Microsoft.Maps.Location(loc1, loc2);

        map = new Microsoft.Maps.Map('#myMap', {
            center: loc,
            zoom: 17,
            mapTypeId: Microsoft.Maps.MapTypeId.streetside,
            streetsideOptions: { locationToLookAt: loc }
        });
        var center = new Microsoft.Maps.Location(loc1, loc2);

        //Create custom Pushpin
        var pin = new Microsoft.Maps.Pushpin(center, {
            title: title,
            subTitle: '',
            text: '1'
        });

        //Add the pushpin to the map
        map.entities.push(pin);
    }
    </script>

    <script type='text/javascript'>
    var BingMapsKey = 'AngujNSnNP_kUgDBzr8SgXCfa-KmpZbCPeUwI276gCsWyItHt6tFTSq7wpMU5qJC';
    
    function geocode() {
        var query = '<?php echo $_GET['address']?>';
        // if (query.indexOf('Srbija') == -1)
        //     query = query + ",Srbija";
        var geocodeRequest = "http://dev.virtualearth.net/REST/v1/Locations?q=" + encodeURIComponent(query) + "&key=" + BingMapsKey;

        CallRestService(geocodeRequest, GeocodeCallback);
    }

    function GeocodeCallback(response) {
       // var output = document.getElementById('output');

        if (response &&
            response.resourceSets &&
            response.resourceSets.length > 0 &&
            response.resourceSets[0].resources) {

            var results = response.resourceSets[0].resources;
            if (results.length>0) {
                $('#myMapTitle').html(results[0].name);
                GetMap(results[0].name, results[0].point.coordinates[0], results[0].point.coordinates[1]);
            }
        } 
    }

    function CallRestService(request, callback) {
        $.ajax({
            url: request,
            dataType: "jsonp",
            jsonp: "jsonp",
            success: function (r) {
                callback(r);
            },
            error: function (e) {
                alert(e.statusText);
            }
        });
    }
    </script>
<div id=myMapTitle></div>
<div id="myMap" style="position:relative;width:100%;min-width:290px;height:600px;background-color:gray"></div>

<script>
    // Dynamic load the Bing Maps Key and Script
    // Get your own Bing Maps key at https://www.microsoft.com/maps
    (async () => {
        let script = document.createElement("script");
        let bingKey = 'AngujNSnNP_kUgDBzr8SgXCfa-KmpZbCPeUwI276gCsWyItHt6tFTSq7wpMU5qJC';
        script.setAttribute("src", `https://www.bing.com/api/maps/mapcontrol?callback=geocode&key=${bingKey}`);
        document.body.appendChild(script);
    })();
</script>

<?php
 }
?>