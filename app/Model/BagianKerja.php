<?php

namespace App\Model;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use App\User;

class BagianKerja extends Model
{
    use Uuid;

    protected $table = 'bagian_kerja';
    protected $fillable = ['label'];

    public function user()
    {
        return $this->hasMany(User::class, 'bagian_kerja', 'id');
    }
}
