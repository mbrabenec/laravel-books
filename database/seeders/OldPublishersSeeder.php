<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Publisher;
use Illuminate\Support\Facades\DB;

class OldPublishersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publishers = DB::table('old_publishers')->get();

        

        foreach($publishers as $publisher) {

            $pub = $publisher->name;

            if(Publisher::where('title', $pub )->first()) {

            } else {

                $b = new Publisher;
                $b['title'] = $publisher->name;
                $b->save();
            }

        }
    }
}
