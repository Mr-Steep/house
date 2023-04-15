<input type="text" name="place" value="{{request('place')}}"
       id="suggest1" placeholder="Город, cтрана" class=" coordinates country-city py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-200 hover:bg-gray-100 outline-none">
<input type="text" hidden name="coordinates[]" id="coordinates" value="{{request('coordinates[]')}}">
<script>
    let _id = 'suggest1'
    ymaps.ready(init);
    let $suggest = $(`#${_id}`);
    let $coordinates = $(`#coordinates`);
    function init() {
        let suggestView1 = new ymaps.SuggestView(_id);

    }
    $suggest.on('change', function(){
        let myGeocoder = ymaps.geocode($suggest.val())
        myGeocoder.then(
            function (res) {
                let coord = res.geoObjects.get(0).geometry.getCoordinates()
                $coordinates.val(coord)
                console.log('Координаты объекта :' + coord);
            },
            function (err) {
                console.log('Ошибка');
            }
        );
    })

</script>
