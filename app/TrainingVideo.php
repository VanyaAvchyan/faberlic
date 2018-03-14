<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class TrainingVideo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'training_videos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'training_level', 'url_am', 'url_ru', 'url_en'
    ];
}
