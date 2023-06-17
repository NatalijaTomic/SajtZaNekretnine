<!DOCTYPE html>
<html lang="en">
<head>
    <title>Streetside look at location - Bing Maps Samples</title>

    <meta charset="utf-8" />
	<link rel="shortcut icon" href="/favicon.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Use the streetside options to location to look at." />
    <meta name="keywords" content="Microsoft maps, map, gis, API, SDK, Bing, Bing Maps" />
    <meta name="author" content="Microsoft Bing Maps" />
    <meta name="screenshot" content="screenshot.jpg" />
    
    <script>
    var map, loc;

    function GetMap() {
        loc = new Microsoft.Maps.Location(39.47618, -121.53738);

        map = new Microsoft.Maps.Map('#myMap', {
            center: loc,
            mapTypeId: Microsoft.Maps.MapTypeId.streetside,
            streetsideOptions: { locationToLookAt: loc }
        });
    }
    </script>
    
</head>
<body>
    <div id="myMap" style="position:relative;width:100%;min-width:290px;height:600px;background-color:gray"></div>

    <script>
        // Dynamic load the Bing Maps Key and Script
        // Get your own Bing Maps key at https://www.microsoft.com/maps
        (async () => {
            let script = document.createElement("script");
            let bingKey = 'AngujNSnNP_kUgDBzr8SgXCfa-KmpZbCPeUwI276gCsWyItHt6tFTSq7wpMU5qJC';
            script.setAttribute("src", `https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=${bingKey}`);
            document.body.appendChild(script);
        })();
    </script>
</body>
</html>