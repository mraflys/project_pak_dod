<?php

namespace App\Model;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Pengetahuan extends Model
{
    use Uuid;
    use SoftDeletes;

    protected $table = 'pengetahuan';
    protected $fillable = ['user_id','judul','keterangan','jenis','berkas'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
