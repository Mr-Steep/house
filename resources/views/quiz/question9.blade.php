@props(['question', 'habitation'])

<div class="flex flex-row h-20  rounded-lg relative bg-transparent mt-1">
    <button data-action="decrement" onclick="return false;"
            class="text-gray-600 h-full w-20 rounded-l cursor-pointer outline-none">
        <span class="m-auto text-2xl font-thin">−</span>
    </button>
    <input type="number" name="price"  min="1" value="{{$habitation->price??1}}" id="price"
           class=" rounded-none	border-0 select-none text-6xl			 outline-none    text-center w-full font-semibold text-md hover:text-black     flex items-center text-gray-700  outline-none">
    <button data-action="increment"
            onclick="return false;"
            class=" text-gray-600 h-full w-20 rounded-r cursor-pointer">
        <span class="m-auto text-2xl font-thin">+</span>
    </button>
</div>

<style>
    input[type='number']::-webkit-inner-spin-button,
    input[type='number']::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .custom-number-input input:focus {
        outline: none !important;
    }

    .custom-number-input button:focus {
        outline: none !important;
    }
</style>

<script>
    function decrement(e) {
        const btn = e.target.parentNode.parentElement.querySelector(
            'button[data-action="decrement"]'
        );
        const target = btn.nextElementSibling;
        let value = Number(target.value);
        value--;
        target.value = value;
    }

    function increment(e) {
        const btn = e.target.parentNode.parentElement.querySelector(
            'button[data-action="decrement"]'
        );
        const target = btn.nextElementSibling;
        let value = Number(target.value);
        value++;
        target.value = value;
    }

    const decrementButtons = document.querySelectorAll(
        `button[data-action="decrement"]`
    );

    const incrementButtons = document.querySelectorAll(
        `button[data-action="increment"]`
    );

    decrementButtons.forEach(btn => {
        btn.addEventListener("click", decrement);
    });

    incrementButtons.forEach(btn => {
        btn.addEventListener("click", increment);
    });
</script>
