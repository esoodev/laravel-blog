<?php
namespace App\Library\Services;

use App\Comment;
use App\Library\Services\MagazineService;

class CommentService
{
    public function postComment()
    {
        return Category::all();
    }

    public function getAllNames()
    {
        return array_column(Category::all()->toArray(), 'name');
    }

    public function getMagazineCount($category)
    {
        if ($category) {
            return count($category->magazines);
        } else {
            return -1;
        }
    }
    
    public function createComment($magazine_id, $data)
    {
        if (MagazineService::find($magazine_id)) {
            $comment = new Comment;
            $comment->name = $data->name;
            $comment->email = $data->email;
            $comment->comment = $data->comment;
            $comment->magazine_id = $magazine_id;

            if (!method_exists($data,'ip')) {
                $comment->ip = null;
            } else {
                $comment->ip = $data->ip();
            }

            $comment->save();
        } else {
            return false;
        }
    }
}
