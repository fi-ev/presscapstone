<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ListRegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!DB::table('list_regions')->count()) {
            DB::unprepared(file_get_contents(__DIR__ . '/sql/regions.sql'));
        }
    }
}
