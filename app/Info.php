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
    protected $fillable = ['title_am', 'title_ru', 'title_en', 'description_am', 'description_ru', 'description_en','user_id', 'type'];

}
