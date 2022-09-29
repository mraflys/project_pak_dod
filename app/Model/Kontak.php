<?php

namespace App\Model;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Kontak extends Model
{
    use Uuid;
    use SoftDeletes;

    protected $table = 'kontak';
    protected $fillable = ['user_id','konten'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
