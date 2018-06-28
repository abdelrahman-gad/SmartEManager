<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $table= 'projects';
    protected $fillable  = [
        'name',
        'description',
        'image',
        'company_id',
        'user_id'

    ];


    public function user(){
		return $this->belongsToMany('App\User');
    }



    public function company(){
		return $this->belongsTo('App\Company');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

}
