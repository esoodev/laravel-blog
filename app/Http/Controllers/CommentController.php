<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Magazine;
use App\Library\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{   

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    /**
     * Create a comment.
     */
    public function store(Request $request)
    {
        // TODO: Validate the request...
        $this->commentService->createComment($request->id, $request);
        return back();
    }
}
