<?php

namespace Tests\Feature;

use App\Models\Comment;
use Illuminate\Http\Response;
use Tests\TestCase;

class CommentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexReturnsDataInValidFormat()
    {
        factory(Comment::class, 10)->create(['post_id' => 1]);

        $this->json('get', 'api/post/1/comments')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'data' => [
                        '*' => [
                            'id',
                            'post_id',
                            'user_name',
                            'text',
                            'parent_id',
                            'replied_id',
                            'created_at',
                            'updated_at'
                        ]
                    ]
                ]
            );
    }

    public function testCommentIsCreatedSuccessfully()
    {
        $comment = [
            'user_name' => 'narges',
            'text' => 'test comment text',
            'post_id' => 1
        ];

        $this->json('post', 'api/post/1/leave-comment', $comment)
            ->assertStatus(Response::HTTP_OK);

        $this->assertDatabaseHas('comments', $comment);
    }
}
