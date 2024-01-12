<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title'=>'1 progetto',
                'slug'=>'1 progetto',
                'img'=>'img1',
                'description'=>'Progetto sulle basi di HTML/CSS e JS'
            ],
            [
                'title'=>'2 progetto',
                'slug'=>'2 progetto',
                'img'=>'img2',
                'description'=>'Progetto sulle basi di VUE'
            ],
            [
                'title'=>'3 progetto',
                'slug'=>'3 progetto',
                'img'=>'img3',
                'description'=>'Progetto sulle basi PHP e LARAVEL'
            ],
            [
                'title'=>'4 progetto',
                'slug'=>'4 progetto',
                'img'=>'img3',
                'description'=>'Progetto sulle basi PHP e LARAVEL'
            ],
            [
                'title'=>'5 progetto',
                'slug'=>'5 progetto',
                'img'=>'img3',
                'description'=>'Progetto sulle basi PHP e LARAVEL'
            ],
            [
                'title'=>'6 progetto',
                'slug'=>'6 progetto',
                'img'=>'img3',
                'description'=>'Progetto sulle basi PHP e LARAVEL'
            ],
            
        ];

        $types = Type::all();
        $types_ids = $types->pluck('id');

        $technologies = Technology::all();
        $technologies_ids = $technologies->pluck('id');
       


        foreach ($projects as $project) {

            $new_project = new Project;
            
            $new_project->title = $project['title'];
            $new_project->slug = Str::slug($new_project->title,'-');
            
            $new_project->img = $project['img'];
            $new_project->description = $project['description'];

            $new_project->type_id = $types_ids->random();

            $new_project->save();
            
            $new_project->technologies()->attach($technologies_ids->random(rand(1,10)));
            
        }


    }
}
