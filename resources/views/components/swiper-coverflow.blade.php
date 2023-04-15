@props(['images'])

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />

    <!-- Demo styles -->
    <style>

        .swiper-slide {
            width: 600px;
            height: 450px;
        }

        @media (max-width: 840px) {
            .swiper-slide {
                width: 300px;
                height: 300px;
            }
        }

    </style>

<!-- Swiper -->
<div class="swiper mySwiper w-full py-5xl">
    <div class="swiper-wrapper">
        @foreach($images as $image)
            <div class="swiper-slide shadow-xl rounded-lg bg-center	bg-cover w-600 h-450"
                 style="background-image: url({{asset($image->path)}})"
            >
            </div>
        @endforeach


    </div>
    <div class="swiper-pagination"></div>
</div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        loop: true,
        slidesPerView: "auto",
        autoplay: {
            delay: 1500,
            disableOnInteraction: true,
        },
        coverflowEffect: {
            rotate: 60,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
        pagination: {
            el: ".swiper-pagination",
        },
    });
</script>
