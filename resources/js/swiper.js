import Swiper from 'swiper';
import 'swiper/css';
import 'swiper/css/pagination';

import { Autoplay, Pagination } from 'swiper/modules';

const swiper = new Swiper('.swiper', {
    modules: [Pagination, Autoplay],
    slidesPerView: 3,
    spaceBetween: 5,
    autoplay: {
        delay: 3000,
    },
    pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
    },
});