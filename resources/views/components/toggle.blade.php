@props(['disabled' => false])
<div class="flex justify-around ">
    <div>
        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Client</span>
    </div>
    <div>

        <label for="sale-toggle" class="inline-flex relative items-center cursor-pointer">
            <input type="checkbox" name="sale" id="sale-toggle" class="sr-only peer">
            <div class="w-14 h-7 bg-blue-600 peer
                rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white
                after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white
                 after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-blue-600 peer-checked:bg-blue-600">

            </div>
        </label>
    </div>

    <div>
        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Lessor</span>

    </div>
</div>

