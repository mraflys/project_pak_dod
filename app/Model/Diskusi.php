<?php

namespace App\Model;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Model\Komentar;

class Diskusi extends Model
{
    use Uuid;
    use SoftDeletes;

    protected $table = 'diskusi';
    protected $fillable = ['user_id','judul','pertanyaan','status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class, 'diskusi_id', 'id')->with('user');
    }
}
