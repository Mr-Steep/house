@props(['habitation'])

<style>
    #map {
        filter: invert(0.85);
        z-index: 0;
        border-radius: 20px;
        overflow: hidden;
    }
    ymaps{
        /*border-radius: 20px;*/
        /*overflow: hidden;*/
    }
    .ymaps-2-1-79-ground-pane{
        filter: grayscale(1);
        -ms-filter: grayscale(1);
        -webkit-filter: grayscale(1);
        -moz-filter: grayscale(1);
        -o-filter: grayscale(1);
    }
</style>

<div class=" h-96 my-5 rounded-lg" id="map"></div>


<script>
    var myMap;

    // Дождёмся загрузки API и готовности DOM.
    ymaps.ready(init);

    function init() {
        myMap = new ymaps.Map('map', {
            suppressMapOpenBlock: true,
            center: [{{$habitation->latitude}}, {{$habitation->longitude}}],
            zoom: 15,
            controls: ['geolocationControl']

        }, {
            suppressMapOpenBlock: true
        });
        myMap.behaviors.disable('scrollZoom');
        myMap.behaviors.disable('drag')

        myMap.geoObjects.add(new ymaps.GeoObject({
            geometry:{
                type:'Point',
                coordinates: [{{$habitation->latitude}}, {{$habitation->longitude}}]
            },

            balloonContent: '<strong>{{$habitation->name}}</strong>',
            properties: {
                iconContent: 'За ночь ${{$habitation->price}} ',
            }
        }, {
            preset: 'islands#blackHomeCircleIcon',
            iconColor: '#0057ff',

        }))

    }
</script>
