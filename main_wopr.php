<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
    <style>
        #map {
            position: absolute !important;
            left: 55px;
            height: 100% !important;
            width: 95% !important;
            z-index: 0;
        }

        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        
    </style>
    
    </head>
    <body>
        <?php
            require_once "funkcje_wopr.php";
            include "./classes/database_c.php";
            include "./classes/load_oddzial_c.php";
            $oddzial_obj = new Oddzial();
            $oddzial=$oddzial_obj->get_all();
        ?>
        <script>

            let map;
            let oddzialArray=<?php echo json_encode($oddzial);?>;
            function initMap() {
                map = new google.maps.Map(document.getElementById("map"), {
                    center: { lat: 51.918, lng:  19.134 },
                    zoom: 8,
                });
                for(let i = 0; i < oddzialArray.length; i++){
                    const contentString ="<h5>"+ oddzialArray[i]["nazwa"]+", kierownik: "+ oddzialArray[i]["kierownik"]+"</h5><br><a class='btn btn-danger w-100' href='info_oddzial.php?oddzial_id="+oddzialArray[i]["id"]+"'>Info</a>";
                    const myLatLng = { lat: parseFloat(oddzialArray[i]["pos_x"]), lng: parseFloat(oddzialArray[i]["pos_y"]) };
                    const infowindow = new google.maps.InfoWindow({
                        content: contentString,
                    });
                    const marker = new google.maps.Marker({
                        position: myLatLng,
                        map,
                        title: toString(oddzialArray[i+1]),
                    });

                    marker.addListener("click", () => {
                        infowindow.open({
                        anchor: marker,
                        map,
                        shouldFocus: false,
                        });
                    });
                };
            };
            window.initMap = initMap;
        </script>
        <?php
        include "header_wopr.php";
        ?>
        <div id="map"></div>
        
        <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNtzh5BRz6k0j5VmnQEZ4Hm_mdFWpCNsM&callback=initMap">
        </script>
    </body>
</html>