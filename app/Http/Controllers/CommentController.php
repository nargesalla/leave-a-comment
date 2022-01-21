<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Repositories\CommentRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    protected $commentRepository;

    /**
     * @param CommentRepository $commentRepository
     */
    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * @param $postId
     * @return JsonResponse
     */
    public function index($postId): JsonResponse
    {
        $comments = $this->commentRepository->index($postId);

        return response()->json($comments);
    }

    /**
     * @param CommentRequest $request
     * @param $postId
     * @return JsonResponse
     */
    public function store(CommentRequest $request, $postId): JsonResponse
    {
        $data = $request->get('data');
        $data['post_id'] = $postId;

        if ($this->commentRepository->store($data)) {
            return response()->json('Comment created!');
        } else {
            return response()->json('Sth went wrong', Response::HTTP_BAD_REQUEST);
        }
    }
}
