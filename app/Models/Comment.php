<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'comments';

    protected $fillable = [
        'user_name',
        'text',
        'parent_id',
        'replied_id',
    ];
}
