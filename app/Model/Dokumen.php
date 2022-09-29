<?php

namespace App\Model;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Model\JenisDokumen;

class Dokumen extends Model
{
    use Uuid;
    use SoftDeletes;

    protected $table = 'dokumen';
    protected $fillable = ['user_id','jenis_id','judul','keterangan','berkas'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function jenis_dokumen()
    {
        return $this->belongsTo(JenisDokumen::class, 'jenis_id', 'id');
    }
}
