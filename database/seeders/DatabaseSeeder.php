<?php

namespace Database\Seeders;

use App\Models\Rule;

use App\Models\User;
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

         User::factory(1)->create([
             'rule_id'=>Rule::factory()->create([
                 'name'=>'admin' ,
                 'id'=>1
             ])->id
         ]);
    }
}
