<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class articles extends Model
{
    use HasFactory;

    public function articleAuthor (){
        return $this->belongsTo(writers::class , 'writer' , 'id');
    }

    public function comments (){
        return $this->hasMany(
            Comments::class ,
            'article_id' ,
            'id'
        )->where('approved' , 1);
    }
    public function tags (){
        return $this->belongsToMany(
            tags::class ,
            'taggables' ,
            'article_id' ,
            'tag_id' ,
            'id' ,
            'id'
        );
    }



}
