<?php

namespace Database\Seeders;

use App\Models\Films;
use App\Models\Janr;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FilmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $janrs = Janr::all();
        foreach ($janrs as $janr){
            $id[] = $janr->id;
        }
        DB::table('films')->insert([
            [
                'name' => Str::random(10),
                'publication' => Str::random(10).' '.Str::random(7),
                'janr_id' => $id[array_rand($id)],
                'image' => 'default.jpg',
                'created_at' => date("Y-m-d h:m:s"),
                'updated_at' => date("Y-m-d h:m:s")
            ],
            [
                'name' => Str::random(10),
                'publication' => Str::random(10).' '.Str::random(7),
                'janr_id' => $id[array_rand($id)],
                'image' => 'default.jpg',
                'created_at' => date("Y-m-d h:m:s"),
                'updated_at' => date("Y-m-d h:m:s")
            ],
            [
                'name' => Str::random(10),
                'publication' => Str::random(10).' '.Str::random(7),
                'janr_id' => $id[array_rand($id)],
                'image' => 'default.jpg',
                'created_at' => date("Y-m-d h:m:s"),
                'updated_at' => date("Y-m-d h:m:s")
            ],
            [
                'name' => Str::random(10),
                'publication' => Str::random(10).' '.Str::random(7),
                'janr_id' => $id[array_rand($id)],
                'image' => 'default.jpg',
                'created_at' => date("Y-m-d h:m:s"),
                'updated_at' => date("Y-m-d h:m:s")
            ]
        ]);
    }
}
