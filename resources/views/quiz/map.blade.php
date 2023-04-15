
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

    /*#adress{*/
    /*    z-index: 999;*/
    /*    margin: 0 auto;*/
    /*    top: 30px;*/
    /*    width: 250px;*/
    /*    position: absolute;*/
    /*    left: 0;*/
    /*    right: 0;*/
    /*    text-align: center;*/
    /*    border-radius: 50px;*/
    /*}*/
    #notice{
        display: none;
    }

</style>
{{--<input type="text"--}}
{{--       id="adress"--}}
{{--       placeholder="Введите адрес" required>--}}
{{--<div id="map">--}}

{{--</div>--}}


    <input type="text" id="suggest" class=" w-10/12 rounded-full m-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
           placeholder="Введите адрес">
<div id="notice" class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
    <span class="font-medium" >Адрес не найден</span>
</div>

<div id="map"></div>

<div id="footer" class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
    <span class="font-medium" id="messageHeader"></span>
    <div id="message"></div>
</div>

<script>
    var myMap;

    // Дождёмся загрузки API и готовности DOM.
    ymaps.ready(init);

    function init1 () {
        myMap = new ymaps.Map('map', {
            suppressMapOpenBlock: true,
            center: [53.90, 27.56],
            zoom: 12,
            controls: []

        },{
            suppressMapOpenBlock: true
        });
    }



    function init() {
        // Подключаем поисковые подсказки к полю ввода.
        var suggestView = new ymaps.SuggestView('suggest'),
            map,
            placemark;

        // При клике по кнопке запускаем верификацию введёных данных.
        $('#suggest').bind('change', function (e) {
            geocode();
        });

        function geocode() {
            // Забираем запрос из поля ввода.
            var request = $('#suggest').val();
            // Геокодируем введённые данные.
            ymaps.geocode(request).then(function (res) {
                var obj = res.geoObjects.get(0),
                    error, hint;

                if (obj) {
                    // Об оценке точности ответа геокодера можно прочитать тут: https://tech.yandex.ru/maps/doc/geocoder/desc/reference/precision-docpage/
                    switch (obj.properties.get('metaDataProperty.GeocoderMetaData.precision')) {
                        case 'exact':
                            break;
                        case 'number':
                        case 'near':
                        case 'range':
                            error = 'Неточный адрес, требуется уточнение';
                            hint = 'Уточните номер дома';
                            break;
                        case 'street':
                            error = 'Неполный адрес, требуется уточнение';
                            hint = 'Уточните номер дома';
                            break;
                        case 'other':
                        default:
                            error = 'Неточный адрес, требуется уточнение';
                            hint = 'Уточните адрес';
                    }
                } else {
                    error = 'Адрес не найден';
                    hint = 'Уточните адрес';
                }

                // Если геокодер возвращает пустой массив или неточный результат, то показываем ошибку.
                if (error) {
                    showError(error);
                    showMessage(hint);
                } else {
                    showResult(obj);
                }
            }, function (e) {
                console.log(e)
            })

        }
        function showResult(obj) {
            // Удаляем сообщение об ошибке, если найденный адрес совпадает с поисковым запросом.
            $('#suggest').removeClass('input_error');
            $('#notice').css('display', 'none');

            var mapContainer = $('#map'),
                bounds = obj.properties.get('boundedBy'),
                // Рассчитываем видимую область для текущего положения пользователя.
                mapState = ymaps.util.bounds.getCenterAndZoom(
                    bounds,
                    [mapContainer.width(), mapContainer.height()]
                ),
                // Сохраняем полный адрес для сообщения под картой.
                address = [obj.getCountry(), obj.getAddressLine()].join(', '),
                // Сохраняем укороченный адрес для подписи метки.
                shortAddress = [obj.getThoroughfare(), obj.getPremiseNumber(), obj.getPremise()].join(' ');
            // Убираем контролы с карты.
            mapState.controls = [];
            // Создаём карту.
            createMap(mapState, shortAddress);
            // Выводим сообщение под картой.
            showMessage(address);
        }

        function showError(message) {
            $('#notice span').text(message);
            $('#suggest').addClass('input_error');
            $('#notice').css('display', 'block');
            // Удаляем карту.
            if (map) {
                map.destroy();
                map = null;
            }
        }

        function createMap(state, caption) {
            // Если карта еще не была создана, то создадим ее и добавим метку с адресом.
            if (!map) {
                map = new ymaps.Map('map', state);
                placemark = new ymaps.Placemark(
                    map.getCenter(), {
                        iconCaption: caption,
                        balloonContent: caption
                    }, {
                        preset: 'islands#redDotIconWithCaption'
                    });
                map.geoObjects.add(placemark);
                // Если карта есть, то выставляем новый центр карты и меняем данные и позицию метки в соответствии с найденным адресом.
            } else {
                map.setCenter(state.center, state.zoom);
                placemark.geometry.setCoordinates(state.center);
                placemark.properties.set({iconCaption: caption, balloonContent: caption});
            }
        }

        function showMessage(message) {
            $('#messageHeader').text('Данные получены:');
            $('#message').text(message);
        }
    }


</script>
