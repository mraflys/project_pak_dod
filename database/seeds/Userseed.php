<?php

use Illuminate\Database\Seeder;
use App\Model\BagianKerja;
use App\Model\JenisDokumen;

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
        JenisDokumen::create([
            'label' => 'Berkas file 1',
            'value' => 'file1',
        ]);
        JenisDokumen::create([
            'label' => 'Berkas file 2',
            'value' => 'file2',
        ]);
    }
}
