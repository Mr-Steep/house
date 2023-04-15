@props(['habitations'])
<style>
    #map {
        /*position: absolute;*/
        width: 100%;
        /*background-color: #fff;*/
        height: 100vh;
        filter: invert(0.85);
        z-index: 0;
    }

    .ymaps-2-1-79-ground-pane {
        filter: grayscale(1);
        -ms-filter: grayscale(1);
        -webkit-filter: grayscale(1);
        -moz-filter: grayscale(1);
        -o-filter: grayscale(1);
    }
</style>

<div id="map" class="overflow-hidden rounded-xl"></div>


<script>
    var myMap;

    // Дождёмся загрузки API и готовности DOM.
    ymaps.ready(init);

    function init() {
        // myMap = new ymaps.Map('map', {
        //     suppressMapOpenBlock: true,
        //     center: [53.90, 27.56],
        //     zoom: 12,
        //     controls: ['geolocationControl']
        //
        // }, {
        //     suppressMapOpenBlock: true
        // });

        let _zoom = 14

        var geolocation = ymaps.geolocation,
            myMap = new ymaps.Map('map', {
                    center: [53.90, 27.56],
                zoom: _zoom,
                controls: []
            }, {
                    suppressMapOpenBlock: true
            });
        _zoom = 17
        // Сравним положение, вычисленное по ip пользователя и
        // положение, вычисленное средствами браузера.
        geolocation.get({
            provider: 'yandex',
        }).then(function (result) {
            // ip
            // Красным цветом пометим положение, вычисленное через ip.
            // result.geoObjects.options.set('preset', 'islands#redCircleIcon');
            // result.geoObjects.get(0).properties.set({
            //     balloonContentBody: 'Мое местоположение'
            // });
            // myMap.geoObjects.add(result.geoObjects);
            // // myMap.setCenter(result.geoObjects.get(0).geometry.getCoordinates(), _zoom, {duration: 300});
            // myMap.setCenter(result.geoObjects.get(0).geometry.getCoordinates(), _zoom, {duration: 300});


        });

        geolocation.get({
            provider: 'browser',
        }).then(function (result) {
            // Синим цветом пометим положение, полученное через браузер.
            // Если браузер не поддерживает эту функциональность, метка не будет добавлена на карту.
            result.geoObjects.options.set('preset', 'islands#bluePersonCircleIcon');
            myMap.geoObjects.add(result.geoObjects);
            myMap.setCenter(result.geoObjects.get(0).geometry.getCoordinates(), _zoom, {duration: 300});

        });

        let counter = 0
        let BalloonContentLayout

        @foreach($habitations as $habitation)

             BalloonContentLayout = ymaps.templateLayoutFactory.createClass(
            '<div style="margin: 10px;">' +
            '<b>{{$habitation->name}}</b><br />' +
            '<a href="{{route('habitation.show', $habitation->id)}}"> посмотреть </button>' +
            '</div>', {

                // Переопределяем функцию build, чтобы при создании макета начинать
                // слушать событие click на кнопке-счетчике.
                build: function () {
                    // Сначала вызываем метод build родительского класса.
                    BalloonContentLayout.superclass.build.call(this);
                    // А затем выполняем дополнительные действия.
                },

                // Аналогично переопределяем функцию clear, чтобы снять
                // прослушивание клика при удалении макета с карты.
                clear: function () {
                    // Выполняем действия в обратном порядке - сначала снимаем слушателя,
                    // а потом вызываем метод clear родительского класса.
                    $('#counter-button').unbind('click', this.onCounterClick);
                    BalloonContentLayout.superclass.clear.call(this);
                },

                onCounterClick: function () {

                }
            });

        var placemark = new ymaps.Placemark([{{$habitation->latitude}}, {{$habitation->longitude}}], {
            name: 'Считаем'
        }, {
            balloonContentLayout: BalloonContentLayout,
            // Запретим замену обычного балуна на балун-панель.
            // Если не указывать эту опцию, на картах маленького размера откроется балун-панель.
            balloonPanelMaxMapArea: 0,
            preset: 'islands#blackHomeCircleIcon',
            iconColor: '#0057ff',
        });

        myMap.geoObjects.add(placemark);
        @endforeach

    }
</script>
