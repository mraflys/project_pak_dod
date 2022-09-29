<?php

namespace App\Model;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use App\Model\Dokumen;

class JenisDokumen extends Model
{
    use Uuid;

    protected $table = 'jenis_dokumen';
    protected $fillable = ['label','value'];

    public function user()
    {
        return $this->hasMany(Dokumen::class, 'jenis_id', 'id');
    }
}
