@props(['habitation'])

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<link rel="stylesheet" href="{{asset('storage/daterangepicker.min.css')}}">
<script type="text/javascript" src="{{asset('storage/jquery.daterangepicker.min.js')}}"></script>


<calendar id="parent-range" class="parent-range rounded-lg  flex flex-row justify-center">
    <input id="date_range" type="text" class="hidden" name="range">
</calendar>

<style>
    .date-picker-wrapper {
        width: 100%;
        margin: 25px 0;
    }

    .month-wrapper {
        width: 100% !important;
        border-radius: 1.2rem !important;
        border:1px solid #efefef !important;
        --tw-shadow: 0 10px 15px -3px rgb(0 0 0 / .1), 0 4px 6px -4px rgb(0 0 0 / .1);
        --tw-shadow-colored: 0 10px 15px -3px var(--tw-shadow-color), 0 4px 6px -4px var(--tw-shadow-color);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow);
    }
    .month1,
    .month2{
        width: 46.5% !important;
        --tw-text-opacity: 1;
        color: rgb(17 24 39 / var(--tw-text-opacity));
        font-weight: 600;
        font-size: .875rem;
        line-height: 1.25rem;
        font-family: Nunito,ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,"Apple Color Emoji","Segoe UI Emoji",Segoe UI Symbol,"Noto Color Emoji";
    }

    .book{
        color: red !important;
        text-decoration: line-through;
    }

</style>
<script type="text/javascript">
    $(window).ready(function () {
        let elem = JSON.parse(`{!!json_encode($habitation->booking()->get())!!}`)
        let isPhone = window.innerWidth < 600;
        console.log(elem)
        $('#date_range').dateRangePicker({
            firstDay: 1,
            language: 'ru',
            inline: true,
            separator: '{{\App\Models\Booking::SEPARATOR}}',
            format: 'YYYY-MM-DD HH:mm',
            alwaysOpen: true,
            showShortcuts: false,
            defaultTime: moment().startOf('day').toDate(),
            defaultEndTime: moment().endOf('day').toDate(),
            time: {
                // enabled: true
            },
            extraClass: 'parent-range',
            startDate:  moment().startOf('day').toDate(),
            beforeShowDay: function (t) {
                let tres = new Date(t);
                for (const i in elem) {
                    let arrival = elem[i].arrival
                    let departure = elem[i].departure
                    let _arrival = new Date(arrival);
                    let _departure = new Date(departure);
                    if (tres >= _arrival && tres <= _departure) {
                        return [false, 'book', 'Зарезервировано'];
                    }
                }
                return [true, '_class', 'free book']
            }
        })

        function padTo2Digits(num) {
            return num.toString().padStart(2, '0');
        }

        function formatDate(date) {
            return [
                padTo2Digits(date.getDate()),
                padTo2Digits(date.getMonth() + 1),
                date.getFullYear(),
            ].join('/');
        }
        $('.drp_top-bar').remove()

    })

</script>








