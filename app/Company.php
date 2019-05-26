<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Company extends Model
{
    //

    use Notifiable;
    protected $fillable = [
        'name',
        'email',
        'logo',
        'website'
    ];

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
}
