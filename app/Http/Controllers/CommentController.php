<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Magazine;
use App\Library\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Create a comment.
     */
    public function store(Request $request, CommentService $commentService)
    {
        // TODO: Validate the request...
        $commentService->createComment($request->id, $request);
        return back();
    }
}
