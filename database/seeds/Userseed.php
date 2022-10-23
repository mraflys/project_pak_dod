<?php

use Illuminate\Database\Seeder;
use App\Model\BagianKerja;
use App\Model\JenisDokumen;
use App\User;
class Userseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bagianKerja = BagianKerja::create([
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

        User::create([
            'name' => 'administrator',
            'email' => 'admin@admin.com',
            'bagian_kerja' => $bagianKerja->id,
            'status' => 1,
            'role' => 0,
            'password' => Hash::make('admin'),
        ]);
    }
}
