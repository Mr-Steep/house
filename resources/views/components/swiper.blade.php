@props(['images'])

<head>

    <style>
        .swiper-slide {
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 18px;
            font-size: 22px;
            font-weight: bold;
            color: #fff;
        }
        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            max-height: 300px;
            object-fit: cover;
        }
    </style>

{{--    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>--}}
</head>

<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        @foreach($images as $image)
            <div data-history="{{$image->id}}" class="swiper-slide">
                <img src="{{asset($image->path)}}"  class="swiper-lazy"/>
            </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>

<script>
    var swiper = new Swiper('.mySwiper', {
        loop: true,
    });
</script>
