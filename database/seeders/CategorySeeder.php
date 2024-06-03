<?php

namespace Database\Seeders;

use App\Models\Asset\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'name' => 'Demo Category',
        ]);
    }
}
