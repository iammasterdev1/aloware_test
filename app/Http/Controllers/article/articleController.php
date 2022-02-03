<?php

namespace App\Http\Controllers\article;

use App\Http\Controllers\Controller;
use App\Models\articles;
use Illuminate\Http\Request;

class articleController extends Controller
{

    public static function getArticleDetails ($id){

        if(articles::find($id)) {
            $article = articles::find($id);
            $article->writer = $article->articleAuthor;
            $article->tags = $article->tags;
        } else{
            $article = null;
        }
        return $article;

    }

}
