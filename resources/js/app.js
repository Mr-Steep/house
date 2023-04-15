import './bootstrap';
import Alpine from 'alpinejs';
import Swiper, { Autoplay, Navigation, Pagination } from "swiper";
import Datepicker from 'flowbite-datepicker/Datepicker';
import DateRangePicker from 'flowbite-datepicker/DateRangePicker';


Alpine.start();
Swiper.use([Autoplay, Navigation, Pagination]);




window.Datepicker = Datepicker;
window.DateRangePicker = DateRangePicker;
window.Alpine = Alpine;
window.Swiper = Swiper;


