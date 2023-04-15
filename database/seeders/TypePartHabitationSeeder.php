<?php

namespace Database\Seeders;

use App\Models\TypePartHabitation;
use Illuminate\Database\Seeder;

class TypePartHabitationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = ['Отдельная комната', 'Место в общей комнате', 'Жилье целиком'];
        foreach ($items as $item) {
            TypePartHabitation::create([
                'name'=>$item
            ]);
        }
    }
}
