<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurposevolumetwoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $purposes = [
            ['purposevtwo' => 'Kunjungan'],
            ['purposevtwo' => 'Permintaan Data'],
        ];

        foreach ($purposes as $purpose) {
            DB::table('purposevolumetwos')->insert($purpose);
        }
    }
}