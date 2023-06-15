<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatajurusanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('datajurusans')->insert([ 'name' => 'Teknologi Informasi', ]);
        DB::table('datajurusans')->insert([ 'name' => 'Arsitektur', ]);
    }
}
