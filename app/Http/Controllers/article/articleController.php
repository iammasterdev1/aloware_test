<?php

namespace App\Http\Controllers\article;

use App\Http\Controllers\Controller;
use App\Http\Requests\article\newComment;
use App\Models\articles;
use App\Models\comments;
use Illuminate\Http\Request;

class articleController extends Controller
{

    public static function getArticleDetails ($id){
        if(articles::find($id)) {
            $article = articles::find($id);
            $article->writer = $article->articleAuthor;
            $tags = $article->tags;
            $comments = $article->comments;
        } else{
            $article = null;
        }
        return $article;

    }

    public function submitNewComment (newComment $request){
        $errors = [];

        /**
         *
         * If user is going to reply a comment, check does this comments belongs to entered article
         *
         */
        if(
            ($request->has('reply_to')) &&
            comments::find($request->get('reply_to'))->article_id != $request->get('article_id')
        ){
            // Entered comment doesn't belong to entered article
            $errors['reply_to'][] = 'entered comment for reply doesn\'t belong to entered article.';

            /**
             *
             * Check the layer of comment
             *
             */
            if(
                comments::find($request->get('reply_to'))->reply_to !== null
            ){
                if(comments::find(comments::find($request->get('reply_to'))->reply_to !== null)){
                    $errors['reply_to'][] = 'you can not reply this comment';
                }
            }
        }



        /**
         *
         * Confirm of there is not a problem
         *
         */
        if(
            count($errors) === 0
        ){
            # No error :)
            $newComment = new comments();
            $newComment->comment_author = htmlspecialchars($request->get('name'));
            $newComment->comment_text    = htmlspecialchars($request->get('comment'));
            if($request->has('reply_to')) $newComment->reply_to = $request->get('reply_to');
            $newComment->article_id = $request->get('article_id');
            $newComment->save();

            return response()->json([
                'message' => 'comment saved successfully.' ,
                'success' => $newComment
            ]);
        }

        return response()->json([
            'message' => 'comment saved successfully.' ,
            'errors' => $errors
        ] , 401);


    }

}
