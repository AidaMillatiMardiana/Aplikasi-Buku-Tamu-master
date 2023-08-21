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
<<<<<<< HEAD
}
=======
}
>>>>>>> f01cbce271541629c4024aebb5e565c9d9490e47
