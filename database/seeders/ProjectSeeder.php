<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $types = Type::all();
        $typesIds = $types->pluck('id');

        $technologies = Technology::all();
        $technologiesIds = $technologies->pluck('id');


        for ($i=0; $i < 10; $i++) { 
            $new_project = new Project();
            
            $new_project->title = $faker->sentence(5);
            $new_project->content = $faker->text(500);
            $new_project->type_id = $faker->optional()->randomElement($typesIds);

            $new_project->save();
            $new_project->technologies()->attach($faker->randomElements($technologiesIds,null)); 
        }
    }
}
