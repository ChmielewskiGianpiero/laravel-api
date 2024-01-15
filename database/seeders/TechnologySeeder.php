<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ['css','js','php','scss','laravel','vue','react','node','c++'];

        foreach ($technologies as $technology_name) 
        {
            $technology = new Technology();
            $technology->name = $technology_name;
            $technology->save();
        };
    }
}
