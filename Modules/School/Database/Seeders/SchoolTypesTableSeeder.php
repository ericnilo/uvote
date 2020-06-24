<?php

namespace Modules\School\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SchoolTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('school_types')->insert([
            ['name' => 'primary', 'created_at' => Carbon::now()],
            ['name' => 'secondary', 'created_at' => Carbon::now()],
            ['name' => 'tertiary', 'created_at' => Carbon::now()]
        ]);
    }
}
