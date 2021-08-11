<?php

/**
 * @var $this yii\web\View
 * @var $markers yii\models\Application
 */

$this->title = 'My Yii Application';
?>
<div class="site-index">


    <div class="body-content">

        <div class="row">

            <div id="map" style="width: 100%; height: 500px"></div>
        </div>

    </div>
</div>


<script type="text/javascript" defer>

    var addresses = <?= $markers ?>;

    window.onload = function() {
      ymaps.ready(init);
    }

    function init() {

        var myMap = new ymaps.Map("map", {
           center: [47.222104, 39.720179],
           zoom: 10
        });

        addresses.forEach(function (item) {

            var address = 'Ростовская область ' + item.address;
            var balloonContent = '<p>' + item.user.full_name + '</p><p>' + item.message + '</p> <i>' + item.city + ' ' + item.address + '</i>';

            ymaps.geocode(address, {
                results: 1
            }).then(function(res) {
                var firstGeoObject = res.geoObjects.get(0),
                    cords = firstGeoObject.geometry.getCoordinates();

                // firstGeoObject.properties.set('balloonContent', 'создали контент для балуна')
                firstGeoObject.properties.set('balloonContentBody', balloonContent);

                myMap.geoObjects.add(firstGeoObject);
            });
        });
    }


</script>