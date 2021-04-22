<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Campany extends Model
{
    protected $table ="companies";
protected $fillable=['name','user_id'];
public $timestamps=false;

    public function users()
    {
        return $this -> belongsTo(User::class,'user_id');
    }
}
