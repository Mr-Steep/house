@props(['question', 'habitation'])
<style>
    .describe{
        background: linear-gradient(45deg, rgba(4,16,42,1) 0%, rgba(45,57,77,1) 71%, rgba(59,73,94,1) 100%);
        color: white;
    }
</style>
<div class="p-5">
    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400  text-3xl font-bold text-gray-900 dark:text-white">Придумайте уникальное <span class="describe px-2 rounded-xl">описание</span>
        которое выделит ваше жилье</label>
    <textarea id="message" rows="4"
              name="description" minlength="20"
              class="block h-1/2 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 text-xl font-bold focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Укромное Душевное место в цетре Города ">{{$habitation->description}}</textarea>

</div>

