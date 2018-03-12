<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unlike extends Model
{
    protected $fillable = ['user_id', 'chusqer_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chusqer()
    {
        return $this->belongsTo(Chusqer::class);
    }

    public function getDislikeDate(User $user){

        return $this->created_at;
    }
}
