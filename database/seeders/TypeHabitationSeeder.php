<?php

namespace Database\Seeders;

use App\Models\TypeHabitation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeHabitationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = ['Дом', 'Квартира', 'Уникальное жильё', 'Бутик Отель'];
        foreach ($items as $item) {
            TypeHabitation::create([
                'name'=>$item
            ]);
        }
    }
}
