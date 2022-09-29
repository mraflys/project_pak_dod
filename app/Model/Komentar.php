<?php

namespace App\Model;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Model\Diskusi;

class Komentar extends Model
{
    use Uuid;
    use SoftDeletes;

    protected $table = 'komentar';
    protected $fillable = ['user_id','diskusi_id','pertanyaan','status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function diskusi()
    {
        return $this->belongsTo(Komentar::class, 'diskusi_id', 'id');
    }
}
