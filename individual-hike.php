<head>
    <meta charset="UTF-8">
    <title>USC Hikes</title>
    <link rel="stylesheet" href="stylesheet.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/ol@v7.1.0/dist/ol.js"></script>


    <style>
        .holder{
            padding: 0px 60px 0px 60px;
        }
        .divider{
            width: 100%;
            height: 1px;
            background: #999;
        }
        .individual-hero{
            display: flex;
            padding:48px;
            justify-content: center;
            align-items: flex-end;
            gap: 32px;
            flex-shrink: 0;
            align-self: stretch;
            border-radius: 20px;
            position:relative;
        }
        .icon{
            width: 20px;
        }
        .individual-title-holder{
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex: 1 0 0;
            z-index:1;
        }
        .details-content{
            display: flex;
            align-items: flex-start;
            gap: 80px;
            align-self: stretch;
            flex-direction:row;
        }
        .details-holder{
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 20px;
            align-self: stretch;
            padding-bottom:80px;
        }
        .text-content{
            display: flex;
            align-items: flex-start;
            gap: 80px;
            align-self: stretch;
        }
        .stars{
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }
        .individual-hero-details{
            display: flex;
            width:90%;
            justify-content: space-between;
            align-items: flex-start;
        }
        .individual-hero-text{
            z-index:1;
            color:white;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 20px;
        }

        .about-holder{
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 16px;
            align-self: stretch;
        }
        .text-content{
            display: flex;
            width: 627px;
            flex-direction: column;
            align-items: flex-start;
            gap: 64px;
        }
        .icon-text{
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .review{
            display: flex;
            padding: 24px 40px;
            align-items: flex-start;
            gap: 40px;
            flex: 1 0 0;
            border-radius: 20px;
            border: 1px solid #E5E5E5;
            background: #FFF;
        }
        .review-inner{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            gap: 20px;
            align-self: stretch;
        }
        .reviews-row{
            display: flex;
            align-items: flex-start;
            gap: 40px;
            align-self: stretch;
        }
        .reviewer{
            display: flex;
            align-items: center;
            flex-direction:row;
            gap: 8px;
            flex: 1 0 0;
        }
        .gradient{
            width: 100%;
            height:50%;
            position: absolute;
            left: -1px;
            bottom: 0px;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.00) 0%, #000 100%);
            z-index:0;
            border-radius:20px;
        }
        .info-holder{
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 16px;
            align-self: stretch;
        }
        .info-text{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            gap: 8px;
        }
        .info-content{
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .info-list{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            gap: 16px;
        }
        .reviews-holder{
            padding-bottom:80px;
        }
        .map-holder{
            border-radius:20px;
        }

        #map {
            width: 50vw;
            height:70vh;
            border-radius:20px;
        }
        .weather-icons{
            display: flex;
            align-items: center;
            gap: 8px;
            flex-direction:row;
        }
        .weather-content{
            margin-top:16px;
            display: flex;
            align-items: center;
            gap: 32px;
            flex-direction:row;
        }
        .weather-info{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            gap: 8px;
        }
        .temperature{
            display: flex;
            align-items: flex-start;
            gap: 16px;
            flex-direction:row;
        }


    </style>
</head>
<body>
<?php

$mysql = new mysqli("webdev.iyaserver.com", "haminjin_guest", "DevIIHikeOn123", "haminjin_hikeOn");

if ($mysql->connect_error) {
    die("Connection failed: " . $mysql->connect_error);
}

$sql = "SELECT * FROM mainView WHERE hikeID = " . $_REQUEST["hikeid"];
$result = $mysql->query($sql);

while($currentrow = $result->fetch_assoc()) {
    $hikeName = $currentrow['name'];
    $hikeImage = 'hikeOnImages/' . $currentrow['imageURL'];
    echo $hikeImage;
}

//hike name
//Stars
//distance from USC
//Region
//About
//TrailLength
//Elevation
//Parking Address

//WeatherAPI

//Reviews

?>
<br>

<div >
    <div class="nav">
        <div class="logo">
            <img src="public/assets/green logo.png">
        </div>
        <div class="nav-items">
            <text class="copy1">Map</text>
            <text class="copy1">Groups</text>
            <text class="copy1">Profile</text>
        </div>
    </div>
</div>

<div class="holder">
    <div class="individual-hero" <?php echo 'style="background-image: url("' . $hikeImage . '"); height:60%;object-fit: cover;top:0;"'?>>
        <div class="individual-title-holder">

            <div class="individual-hero-text">
                <h3 style="line-height:0px"><?php echo $hikeName; ?></h3>
                <div class="individual-hero-details">
                    <div class="icon-text">
                        <img src="public/assets/map-pin.svg" class="icon">
                        <text class="copy1">North Hollywood</text>
                    </div>
                    <div class="icon-text">
                        <img src="public/assets/road.svg" class="icon">
                        <text class="copy1">2.5 mi away</text>
                    </div>
                </div>
                <div class="stars">
                    <img src="public/assets/star.svg" class="icon">
                    <img src="public/assets/star.svg" class="icon">
                    <img src="public/assets/star.svg" class="icon">
                    <img src="public/assets/star.svg" class="icon">
                    <img src="public/assets/star.svg" class="icon">
                </div>
            </div>

            <button class="search-button">
                <img src="public/assets/heart-empty.svg" class="icon">
                <span class="btn-text">Like</span>
            </button>
        </div>
        <div class="gradient">
        </div>
    </div>
    <div class="details-holder">
        <h3>Details</h3>
        <div class="details-content">
            <div class="text-content">
                <div class="about-holder">
                    <text class="caption1">About</text>
                    <text class="copy1">The Hollywood Sign Hike is a popular outdoor activity in Los Angeles, California, that offers stunning views of the iconic Hollywood Sign and the surrounding cityscape. It's a favorite among locals and tourists alike, providing an opportunity to get up close to one of the most famous landmarks in the world.</text>
                </div>
                <div class="info-holder">
                    <text class="caption1">Details</text>
                    <div class="info-list">
                        <div class="info-content">
                            <img src="public/assets/footprints.svg" class="icon">
                            <div class="info-text">
                                <text style="color:#999">Trail Length:</text>
                                <text>3.3 mi.</text>
                            </div>
                        </div>
                        <div class="info-content">
                            <img src="public/assets/mountains.svg" class="icon">
                            <div class="info-text">
                                <text style="color:#999">Elevation:</text>
                                <text>1250 ft.</text>
                            </div>
                        </div>
                        <div class="info-content">
                            <img src="public/assets/car.svg" class="icon">
                            <div class="info-text">
                                <text style="color:#999">Parking:</text>
                                <text>3200 Canyon Dr, Los Angeles, CA.</text>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="weather-holder">
                    <text class="caption1">Weather</text>
                    <div class="weather-content">
                        <div class="weather-icons">
                            <img src="public/assets/sun.svg" style="width:48px">
                            <text class="temperature-colored" style ="font-size:48px; color:#EE8100;">76°F</text>
                        </div>
                        <div class="weather-info">
                            <text class="copy1">Partly Cloudy</text>
                            <div class="temperature">
                                <text class="copy1">High: 76°F</text>
                                <text class="copy1">Low: 58°F</text>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="map-holder">
                <div id="map">
                    <script>
                        var _coords = [{"lat":"34.0211722","long":"-118.2871978","name":"Watt Way, University Park, Los Angeles, Los Angeles County, California, 90089, United States"},{"lat":"34.0235346","long":"-118.2857239","name":"Watt Way, University Park, Los Angeles, Los Angeles County, California, 90089, United States"}];
                        var map;

                        function initMap() {
                            map = new ol.Map({
                                target: "map",
                                layers: [
                                    new ol.layer.Tile({
                                        source: new ol.source.OSM(),
                                    }),
                                ],
                                view: new ol.View({
                                    center: ol.proj.fromLonLat([long, latd]),
                                    zoom: 14,
                                    maxZoom: 18,
                                }),
                                overlay: [
                                    new ol.Overlay({
                                        element: container
                                    }),
                                ],
                            });
                        }

                        function addMarker(latd, long, name) {
                            var _feature = new ol.Feature({
                                geometry: new ol.geom.Point(ol.proj.fromLonLat([long, latd])),

                            });
                            _feature.set("Name", name);

                            var layer = new ol.layer.Vector({
                                source: new ol.source.Vector({
                                    features: [
                                        _feature,
                                    ],
                                }),
                            });
                            map.addLayer(layer);
                        }

                        if(_coords.length > 0){
                            var latd = _coords[0]["lat"], long = _coords[0]["long"];

                            // load and setup map layers
                            initMap();

                            // to set all the pins
                            for (let i = 0; i < _coords.length; i++) {
                                addMarker(_coords[i]["lat"], _coords[i]["long"], _coords[i]["name"]);
                            }

                            // for the popup box
                            var container = document.getElementById('popup');
                            var content = document.getElementById('popup-content');

                            var overlay = new ol.Overlay({
                                element: container,
                                autoPan: true,
                                autoPanAnimation: {
                                    duration: 250
                                }
                            });

                            map.addOverlay(overlay);

                            map.on('pointermove', function (event) {
                                const features = map.getFeaturesAtPixel(event.pixel);
                                if (features.length > 0) {
                                    var coordinate = event.coordinate;
                                    const name = features[0].get('Name');
                                    //simple text written in the popup, values are just of the second index
                                    content.innerHTML = '<br><b>Address: </b>'+name;//just the second one is getting displayed
                                    overlay.setPosition(coordinate);
                                }
                                else {
                                    // if there are no features on the hovered position then hide the popup box
                                    overlay.setPosition(undefined);
                                }
                            });
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
    <div class="divider"></div>
    <div class="reviews-holder">
        <h3>Reviews</h3>
        <div class="reviews-row">
            <div class="review">
                <div class="review-inner">
                    <div class="reviewer">
                        <div class="profile">
                            <img src="public/assets/profile-pic.svg">
                        </div>
                        <div class="reviewer-info">
                            <text>Tim H.</text>
                        </div>
                    </div>
                    <text class="copy1">This was a super fun hike! Best to go in the morning when its less crowded. Also really liked the view at the top of the trail. Really hard to beat it!</text>
                    <div class="stars">
                        <img src="public/assets/star.svg" class="icon">
                        <img src="public/assets/star.svg" class="icon">
                        <img src="public/assets/star.svg" class="icon">
                        <img src="public/assets/star.svg" class="icon">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="divider"></div>
    <div class="recs-holder">
        <h3>Similar hikes</h3>
        <div class="hike-row">
            <div class="hike-individual">
                <!--reuse hike card here-->
            </div>
        </div>
    </div>
</div>


<div class="footer">
    <img src="public/assets/logotype bottom.png"  id="bottomLogo">
    <div>
        <text>Acad 276: Dev II</text>
    </div>
</div>


</body>

