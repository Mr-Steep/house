@props(['habitation'])
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
            min-height: 300px;
            object-fit: cover;
        }
    </style>
</head>
<a href="{{route('habitation.show', $habitation->id)}}">
    <div class="rounded overflow-hidden shadow-lg">
        <x-swiper :images="$habitation->images()->get()"/>

        <div class="px-6 py-4 h-32">
            <div class="flex flex-row justify-between">
                <div class="font-bold text-xl mb-2">{{$habitation->name}}</div>
                <span class="ml-3 text-lg font-medium">${{$habitation->price}}</span>
            </div>

            <p class="text-gray-700 text-sm ">
                {{ Str::limit($habitation->description, 80) }}
            </p>
        </div>
        <div class="px-6 pt-4 pb-2">
            @foreach($habitation->advantages() as $adv)
                <span class="inline-block bg-gray-200 rounded-full px-2 text-xs	 py-1  font-semibold text-gray-700 mr-2 mb-2">#{{$adv->name}}</span>
            @endforeach
        </div>
    </div>
</a>
