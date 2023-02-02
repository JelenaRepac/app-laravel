<?php

namespace Database\Seeders;

use App\Models\Presenter;
use App\Models\Studio;
use App\Models\TVShow;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        User::truncate();
        Presenter::truncate();
        Studio::truncate();
        TVShow::truncate();

        User::factory(5)->create();
        Presenter::factory(5)->create();
        //$p1=new Presenter(['name'=>'Mihailo']);
        //$p2=new Presenter(['name'=>'Igor']);
        //$p3=new Presenter(['name'=>'Kosta']);
        //$p1->save();
        //$p2->save();
        //$p3->save();
        Studio::factory(5)->create();
        TVShow::factory(5)->create();
        // TVShow::factory(5)->create(['presenter_id'=>$p3->id]);
         
    }
}
