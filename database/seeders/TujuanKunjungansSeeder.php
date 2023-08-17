<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TujuanKunjungan;

class TujuanKunjungansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TujuanKunjungan::create(
            ['tujuankunjungan_type'     => 'Kunjungan Dinas']
        );
        TujuanKunjungan::create(
            ['tujuankunjungan_type'     => 'Evaluasi']
        );
        TujuanKunjungan::create(
            ['tujuankunjungan_type'     => 'Pengantaran Data']
        );
        TujuanKunjungan::create(
            ['tujuankunjungan_type'     => 'dll(dan lain lain)']
        );
    }
}