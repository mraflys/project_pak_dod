<?php

use Illuminate\Database\Seeder;
use App\Model\BagianKerja;

class Userseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BagianKerja::create([
            'label' => 'Presiden',
        ]);
        BagianKerja::create([
            'label' => 'DPR',
        ]);
        BagianKerja::create([
            'label' => 'DPRD',
        ]);
        BagianKerja::create([
            'label' => 'DPD',
        ]);
        BagianKerja::create([
            'label' => 'MPR',
        ]);
    }
}
