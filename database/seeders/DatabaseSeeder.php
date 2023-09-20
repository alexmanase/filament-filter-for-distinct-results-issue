<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        Product::factory(9)->state(new Sequence(
                ['name' => 'car'],
                ['name' => 'bicycle'],
                ['name' => 'track'],
            )
        )->create();
    }
}