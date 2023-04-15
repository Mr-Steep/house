<div class="head flex-1 flex flex-col  justify-center">
    <button
        type="button"
        id="btn_map"
        class="h-12 text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-3xl text-sm px-5 py-1.5 text-center m-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
        Использовать текущее местоположение
    </button>
    <button
        type="button"
        id="hand"
        class="h-12 text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-3xl text-sm px-5 py-1.5 text-center m-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
        Ввести адрес вручную
    </button>
</div>
<button type="button" id="back"
        class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center m-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800">
    Назад
</button>
<div id="handle" class="p-2">

    <input type="text" id="suggest" placeholder="Город, улица, дом" class="w-full my-5">
    <script>
        let _id = 'suggest'
        ymaps.ready(init);
        let $suggest = $(`#${_id}`);
        function init() {
            let suggestView1 = new ymaps.SuggestView(_id);

        }

        ymaps.ready(function() {
            // Create a suggestView object
            var suggestView = new ymaps.SuggestView('suggest');

            // Bind the suggest and select events to the suggestView object
            suggestView.events.add('suggest', function(event) {
                console.log('User input an address:', event.originalEvent.target.value);
            });

            suggestView.events.add('select', function(event) {
                let myGeocoder = ymaps.geocode($suggest.val())
                myGeocoder.then(
                    function (result) {
                        geoObject = result.geoObjects.get(0)
                        coords = geoObject.geometry.getCoordinates()
                        console.log(coords)
                        city = geoObject.getLocalities()[0]
                        house = geoObject.getPremiseNumber()
                        street = geoObject.getThoroughfare()
                        console.log(city, street, house, coords[0], coords[1])
                        fill(city, street, house, coords[0], coords[1])
                    },
                    function (err) {
                        console.log('Ошибка',err);
                    }
                );
            });
        });




    </script>

    <div class="relative z-0 mb-3 w-full group">
        <input type="text" name="city" id="city"
               class="block py-1.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
               placeholder=" "/>
        <label for="city"
               class=" left-0 peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Город</label>
    </div>
    <div class="relative z-0 mb-3 w-full group">
        <input type="text" name="street" id="street"
               class="block py-1.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
               placeholder=" "/>
        <label for="street"
               class=" left-0 peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Улица</label>
    </div>


    <div class="grid grid-cols-2 gap-6">
        <div class="relative z-0 mb-3 w-full group">
            <input type="text" name="house" id="house"
                   class="block py-1.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" "/>
            <label for="house"
                   class=" left-0 peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Дом</label>
        </div>
        <div class="relative z-0 mb-3 w-full group">
            <input type="number" name="floor" id="floor"
                   class="block py-1.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" "/>
            <label for="floor"
                   class=" left-0 peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Этаж</label>
        </div>
    </div>

    <input type="text" hidden id="latitude" name="latitude" value="">
    <input type="text" hidden id="longitude" name="longitude" value="">

</div>

<div id="map" class="w-full h-full"></div>


<style>
    #map,
    #back,
    #handle {
        display: none;
    }

    #map {
        filter: invert(0.85);
    }

    .ymaps-2-1-79-ground-pane {
        filter: grayscale(1);
        -ms-filter: grayscale(1);
        -webkit-filter: grayscale(1);
        -moz-filter: grayscale(1);
        -o-filter: grayscale(1);
    }

</style>

<script>


    let $head = $('.head')
    let $hand = $('#hand')
    let $btn_map = $('#btn_map')
    let $map = $('#map')
    let $handle = $('#handle')
    let $back = $('#back')
    $hand.on('click', () => {
        $handle.show()
        $head.hide()
        $back.show()
    })
    $btn_map.on('click', () => {
        _show()
        $map.show()
        $head.hide()
        ymaps.ready(init);
        $back.show()
    })

    $back.on('click', () => {
        $map.html('')
        $map.hide()
        $handle.hide()
        $head.show()
        $back.hide()

    })


    let geoObject
    let coords
    let city
    let house
    let street


    function init() {
        // let _zoom = 15
        //
        // var geolocation = ymaps.geolocation,
        //     myMap = new ymaps.Map('map', {
        //         center: [55, 34],
        //         zoom: _zoom,
        //         controls: []
        //
        //     }, {
        //         suppressMapOpenBlock: true
        //     });
        // let _result = []
        // // Сравним положение, вычисленное по ip пользователя и
        // // положение, вычисленное средствами браузера.
        // geolocation.get({
        //     provider: 'yandex',
        //     mapStateAutoApply: true,
        // }).then(function (result) {
        //     // Красным цветом пометим положение, вычисленное через ip.
        //     result.geoObjects.options.set('preset', 'islands#blueHomeIcon');
        //     result.geoObjects.get(0).properties.set({
        //         balloonContentBody: 'Мое местоположение'
        //     });
        //     myMap.geoObjects.add(result.geoObjects);
        //     myMap.setZoom( 6 );
        //     geoObject = result.geoObjects.get(0)
        //     coords = geoObject.geometry.getCoordinates()
        //     city = geoObject.getLocalities()[0]
        //     house = geoObject.getPremiseNumber()
        //     street = geoObject.getThoroughfare()
        //     fill(city, street, house, coords[0], coords[1])
        //     // myMap.setCenter(result.geoObjects.get(0).geometry.getCoordinates(), _zoom, {duration: 300});
        // });
        //
        // geolocation.get({
        //     provider: 'browser',
        //     mapStateAutoApply: true,
        // }).then(function (result) {
        //     myMap.setZoom( 6 );

        // Синим цветом пометим положение, полученное через браузер.
        // Если браузер не поддерживает эту функциональность, метка не будет добавлена на карту.
        // result.geoObjects.options.set('preset', 'islands#blueHomeIcon');
        // myMap.geoObjects.add(result.geoObjects);
        // geoObject = result.geoObjects.get(0)
        // coords = geoObject.geometry.getCoordinates()
        // city = geoObject.getLocalities()[0]
        // house = geoObject.getPremiseNumber()
        // street = geoObject.getThoroughfare()
        // fill(city, street, house, coords[0], coords[1])

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
        });

        geolocation.get({
            provider: 'browser',
        }).then(function (result) {
            // Синим цветом пометим положение, полученное через браузер.
            // Если браузер не поддерживает эту функциональность, метка не будет добавлена на карту.
            result.geoObjects.options.set('preset', 'islands#bluePersonCircleIcon');
            myMap.geoObjects.add(result.geoObjects);
            myMap.setCenter(result.geoObjects.get(0).geometry.getCoordinates(), _zoom, {duration: 300});

            geoObject = result.geoObjects.get(0)
            coords = geoObject.geometry.getCoordinates()
            city = geoObject.getLocalities()[0]
            house = geoObject.getPremiseNumber()
            street = geoObject.getThoroughfare()
            fill(city, street, house, coords[0], coords[1])
            setTimeout(function () {
                fill(city, street, house, coords[0], coords[1])
            }, 300)
        });
    }


    function fill(city, street, house, latitude, longitude) {
        let $_city = $('#city')
        let $_street = $('#street')
        let $_house = $('#house')
        let $_latitude = $('#latitude')
        let $_longitude = $('#longitude')

        $_city.val(city)
        $_street.val(street)
        $_house.val(house)
        $_latitude.val(latitude)
        $_longitude.val(longitude)
    }

    function _show() {
        $handle.show()
        $('#back-white').css('height', 'auto')
    }


</script>
