<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository
{
    /**
     * @param $postId
     * @return mixed
     */
    public function index($postId)
    {
        return Comment::where('post_id', $postId)
            ->orderByDesc('created_at')
            ->get();
    }

    /**
     * @param $data
     * @return bool
     */
    public function store($data): bool
    {
        $comment = new Comment($data);

        return $comment->save();
    }

}
