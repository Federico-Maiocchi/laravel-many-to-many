<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Type;

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
                'img'=>'img1',
                'description'=>'Progetto sulle basi di HTML/CSS e JS'
            ],
            [
                'title'=>'2 progetto',
                'img'=>'img2',
                'description'=>'Progetto sulle basi di VUE'
            ],
            [
                'title'=>'3 progetto',
                'img'=>'img3',
                'description'=>'Progetto sulle basi PHP e LARAVEL'
            ],
            
        ];

        $types = Type::all();
        $ids = $types->pluck('id');
       


        foreach ($projects as $project) {

            $new_project = new Project;
            $new_project->title = $project['title'];
            $new_project->img = $project['img'];
            $new_project->description = $project['description'];
            $new_project->type_id = $ids->random();
            $new_project->save();   
        }


    }
}
