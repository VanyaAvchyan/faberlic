<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'infos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'type', 'user_id'];

}
