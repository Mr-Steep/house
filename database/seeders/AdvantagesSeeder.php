<?php

namespace Database\Seeders;

use App\Models\Advantages;
use Illuminate\Database\Seeder;

class AdvantagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            'Бассейн',
            'Джакузи',
            'Внутренний Двор',
            'Тренажеры',
            'Камин',
            'Биллиард',
            'Wi-Fi',
            'Телевизор',
            'Стиральная машина',
            'Бесплатная парковка',
            'Кондиционер',
            'Фен',
            'Аптечка',
            'Огнетушитель',
        ];
        foreach ($items as $item) {
            Advantages::create([
                'name'=>$item
            ]);
        }
    }
}
