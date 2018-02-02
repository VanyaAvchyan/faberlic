<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'videos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',

        'title_am', 
        'title_ru', 
        'title_en',
        
        'description_am',
        'description_ru',
        'description_en',
        
        'thumb_am',
        'thumb_ru',
        'thumb_en',
        
        'url_am',
        'url_ru',
        'url_en',
    ];

}
