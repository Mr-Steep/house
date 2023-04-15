{{--@props(['disabled' => false])--}}
<!-- Modal toggle -->
<button
    class="block button-open-modal text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
    type="button" data-modal-toggle="authentication-modal">
    Add Property
</button>

<style>
    .modal-enter-address {
        display: none;
        /*width: 85%;*/
        /*margin: 1% auto;*/
        /*border-radius: 15px;*/
        /*background: white;*/
        /*box-shadow: 0px 0px 15px 5px lightgrey;*/
    }

    .spinner {
        margin: 0 auto;
    }

    ymaps {
        /*border-radius: 15px 15px 0 0;*/
    }

    .form {
        display: flex;
        flex-direction: row;
        justify-content: center;
        flex-wrap: wrap;
    }

    input {
        border: 0;
        background: #e7e7e7;
        width: 100%;
        height: 100%;
        padding: 0;
        text-align: center;
        border-radius: 15px;
        font-size: 17px;
    }

    .form-item {
        padding: 1%;
        height: 55px;
        flex-grow: 1;
    }

    .street {
        flex: 1 1 250px;
    }

    .house {
        flex: 1 0 60px;;
    }

    .entrance {
        flex: 1 0 60px;;
    }

    .flat {
        flex: 1 0 60px;;
    }

    .floor {
        flex: 1 0 60px;;
    }

    .modal-footer {
        display: flex;
        flex-direction: row;
        justify-content: center;
        flex-wrap: wrap;
    }

    .footer-button {
        padding: 1%;
        height: 55px;
        flex: 1 0 130px;
    }

    .footer-button button {
        width: 100%;
        height: 100%;
        border: 0;
        border-radius: 15px;
        font-size: 17px;
        padding: 1%;
    }

    .button-cancel {
        background: #ffaaaa;
        color: dimgrey
    }

    .button-cancel:hover {
        cursor: pointer;
        background: #ff8080;
    }

    .button-continue {
        background: #beffbe;
        color: dimgrey
    }

    .button-continue:hover {
        cursor: pointer;
        background: #86ff86;
    }

    button:active {
        transform: translateY(2px);
    }


    @media (max-width: 400px) {

        .modal-enter-address {
            width: 100%;
            position: absolute;
            top: 0;
            margin: 0;
            padding: 0;
            border-radius: 0;
        }

        ymaps {
            border-radius: 0;
        }
    }

</style>

<div class="fade modal-enter-address">

    <div class="modal-body" style="padding: 0">

        <div id="map">
            <div class="spinner spinner-grow">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                     style="margin: auto; ; display: block;" width="100px" height="100px" viewBox="0 0 100 100"
                     preserveAspectRatio="xMidYMid">
                    <g>
                        <circle cx="73.801" cy="68.263" fill="#251d18" r="3">
                            <animateTransform attributeName="transform" type="rotate" calcMode="spline"
                                              values="0 50 50;360 50 50" times="0;1" keySplines="0.5 0 0.5 1"
                                              repeatCount="indefinite" dur="1.4925373134328357s"
                                              begin="0s"></animateTransform>
                        </circle>
                        <circle cx="68.263" cy="73.801" fill="#251d18" r="3">
                            <animateTransform attributeName="transform" type="rotate" calcMode="spline"
                                              values="0 50 50;360 50 50" times="0;1" keySplines="0.5 0 0.5 1"
                                              repeatCount="indefinite" dur="1.4925373134328357s"
                                              begin="-0.062s"></animateTransform>
                        </circle>
                        <circle cx="61.481" cy="77.716" fill="#251d18" r="3">
                            <animateTransform attributeName="transform" type="rotate" calcMode="spline"
                                              values="0 50 50;360 50 50" times="0;1" keySplines="0.5 0 0.5 1"
                                              repeatCount="indefinite" dur="1.4925373134328357s"
                                              begin="-0.125s"></animateTransform>
                        </circle>
                        <circle cx="53.916" cy="79.743" fill="#251d18" r="3">
                            <animateTransform attributeName="transform" type="rotate" calcMode="spline"
                                              values="0 50 50;360 50 50" times="0;1" keySplines="0.5 0 0.5 1"
                                              repeatCount="indefinite" dur="1.4925373134328357s"
                                              begin="-0.187s"></animateTransform>
                        </circle>
                        <circle cx="46.084" cy="79.743" fill="#251d18" r="3">
                            <animateTransform attributeName="transform" type="rotate" calcMode="spline"
                                              values="0 50 50;360 50 50" times="0;1" keySplines="0.5 0 0.5 1"
                                              repeatCount="indefinite" dur="1.4925373134328357s"
                                              begin="-0.25s"></animateTransform>
                        </circle>
                        <circle cx="38.519" cy="77.716" fill="#251d18" r="3">
                            <animateTransform attributeName="transform" type="rotate" calcMode="spline"
                                              values="0 50 50;360 50 50" times="0;1" keySplines="0.5 0 0.5 1"
                                              repeatCount="indefinite" dur="1.4925373134328357s"
                                              begin="-0.312s"></animateTransform>
                        </circle>
                        <circle cx="31.737" cy="73.801" fill="#251d18" r="3">
                            <animateTransform attributeName="transform" type="rotate" calcMode="spline"
                                              values="0 50 50;360 50 50" times="0;1" keySplines="0.5 0 0.5 1"
                                              repeatCount="indefinite" dur="1.4925373134328357s"
                                              begin="-0.375s"></animateTransform>
                        </circle>
                        <circle cx="26.199" cy="68.263" fill="#251d18" r="3">
                            <animateTransform attributeName="transform" type="rotate" calcMode="spline"
                                              values="0 50 50;360 50 50" times="0;1" keySplines="0.5 0 0.5 1"
                                              repeatCount="indefinite" dur="1.4925373134328357s"
                                              begin="-0.437s"></animateTransform>
                        </circle>
                        <animateTransform attributeName="transform" type="rotate" calcMode="spline"
                                          values="0 50 50;0 50 50" times="0;1" keySplines="0.5 0 0.5 1"
                                          repeatCount="indefinite" dur="1.4925373134328357s"></animateTransform>
                    </g>
                </svg>
            </div>

        </div>
        {{--        <form class="form">--}}
        {{--            <div class="form-item street">--}}
        {{--                <input type="text" class="form-control " id="street" placeholder="Улица">--}}
        {{--            </div>--}}
        {{--            <div class="form-item house">--}}
        {{--                <input pattern="[0-9]*" type="text" class="form-control" id="house" placeholder="Дом">--}}
        {{--            </div>--}}
        {{--            <div class="form-item entrance">--}}
        {{--                <input pattern="[0-9]*" type="text" class="form-control" id="entrance" placeholder="Подъезд">--}}
        {{--            </div>--}}
        {{--            <div class="form-item flat">--}}
        {{--                <input pattern="[0-9]*" type="text" class="form-control" id="flat" placeholder="Квартира">--}}
        {{--            </div>--}}
        {{--            <div class="form-item floor">--}}
        {{--                <input pattern="[0-9]*" type="text" class="form-control" id="floor" placeholder="Этаж">--}}
        {{--            </div>--}}
        {{--        </form>--}}


        <form method="POST" action="/property">
            @csrf
            <div class="relative z-0 mb-6 w-full group street">
                <input type="text" name="city" id="city"
                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required="">
                <label for="city"
                       class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Город</label>
            </div>  <div class="relative z-0 mb-6 w-full group street">
                <input type="text" name="street" id="street"
                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required="">
                <label for="street"
                       class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Улица</label>
            </div>
            <div class="relative z-0 mb-6 w-full group house">
                <input type="text" name="house" id="house"
                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required="">
                <label for="house"
                       class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Дом</label>
            </div>
            <div class="relative z-0 mb-6 w-full group entrance">
                <input type="text" name="entrance" id="entrance"
                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required="">
                <label for="entrance"
                       class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Подъезд</label>
            </div>
            <div class="relative z-0 mb-6 w-full group floor">
                <input type="text" name="floor" id="floor"
                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required="">
                <label for="floor"
                       class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Этаж</label>
            </div>
            <div class="relative z-0 mb-6 w-full group floor">
                <input type="text" name="flat" id="flat"
                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required="">
                <label for="flat"
                       class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Квартира</label>
            </div>
            <input type="text" hidden name="lat" id="lat">
            <input type="text" hidden name="lng" id="lng">

            <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </form>

    </div>
</div>

<script type="text/javascript">


    let downloadMaps = async () => {

        setTimeout(() => {
            let width = $('.modal-body').width()
            let height = window.screen.width < 400 ? width * 1.2 : width / 2.7;
            $('#map').width(width).height(height)
            ymaps.ready(() => {
                let map;
                ymaps.geolocation.get().then(function (res) {
                    let mapContainer = $('#map'),
                        bounds = res.geoObjects.get(0).properties.get('boundedBy'),
                        // Рассчитываем видимую область для текущей положения пользователя.
                        mapState = ymaps.util.bounds.getCenterAndZoom(
                            bounds,
                            [mapContainer.width(), mapContainer.height()]
                        );
                    $('.spinner').hide()
                    createMap(mapState);
                    let geoObject = res.geoObjects.get(0),
                        coords = geoObject.geometry.getCoordinates()
                    geoObject.properties.set('iconCaption', geoObject.getAddressLine());
                    map.geoObjects.add(geoObject);
                    // let city = geoObject.getLocalities()[0]
                    // let house = geoObject.getPremiseNumber()
                    // let street = geoObject.getThoroughfare()

                }, (e) => {
                    // Если местоположение невозможно получить, то просто создаем карту.
                    createMap({
                        center: [55.751574, 37.573856],
                        zoom: 2
                    });
                });

                function createMap(state) {
                    state.controls = []
                    var myPlacemark, map = new ymaps.Map('map', state, {
                        suppressMapOpenBlock: true
                    }, {   searchControlProvider: 'yandex#search'});

                    map.events.add('click', function (e) {
                        var coords = e.get('coords');

                        // Если метка уже создана – просто передвигаем ее.
                        if (myPlacemark) {
                            myPlacemark.geometry.setCoordinates(coords);
                        }
                        // Если нет – создаем.
                        else {
                            myPlacemark = createPlacemark(coords);
                            map.geoObjects.add(myPlacemark);
                            // Слушаем событие окончания перетаскивания на метке.
                            myPlacemark.events.add('dragend', function () {
                                getAddress(myPlacemark.geometry.getCoordinates());
                            });
                        }
                        getAddress(coords);
                    });

                    // Создание метки.
                    function createPlacemark(coords) {
                        return new ymaps.Placemark(coords, {
                            iconCaption: 'поиск...'
                        }, {
                            preset: 'islands#violetDotIconWithCaption',
                            draggable: true
                        });
                    }

                    // Определяем адрес по координатам (обратное геокодирование).
                    function getAddress(coords) {
                        myPlacemark.properties.set('iconCaption', 'поиск...');
                        ymaps.geocode(coords).then(function (res) {
                            var firstGeoObject = res.geoObjects.get(0);

                            myPlacemark.properties
                                .set({
                                    // Формируем строку с данными об объекте.
                                    iconCaption: [
                                        // Название населенного пункта или вышестоящее административно-территориальное образование.
                                        firstGeoObject.getLocalities().length ? firstGeoObject.getLocalities() : firstGeoObject.getAdministrativeAreas(),
                                        // Получаем путь до топонима, если метод вернул null, запрашиваем наименование здания.
                                        firstGeoObject.getThoroughfare() || firstGeoObject.getPremise()
                                    ].filter(Boolean).join(', '),
                                    // В качестве контента балуна задаем строку с адресом объекта.
                                    balloonContent: firstGeoObject.getAddressLine()
                                });

                            let city = firstGeoObject.getLocalities()[0]
                            let house = firstGeoObject.getPremiseNumber()
                            let street = firstGeoObject.getThoroughfare()
                            let cord = firstGeoObject.geometry.getCoordinates()
                            $('#street').val(street)
                            $('#house').val(house)
                            $('#city').val(city)
                            $('#lat').val(cord[0])
                            $('#lng').val(cord[1])

                        });

                    }


                }
            });
        }, 300)
    }

    $('.button-open-modal').one('click', () => {
        downloadMaps()
        $('.modal-enter-address').show()
        $('.body').addClass('modal')
        $('modal').show()
    })

    $('.modal-footer button').on('click', () => {
        setTimeout(() => {
            $('.modal-enter-address').hide()
            $('.body').removeClass('modal')
            $('modal').hide()
            $('ymaps').remove()
            $('.spinner').show()
        }, 300)

    })

</script>
