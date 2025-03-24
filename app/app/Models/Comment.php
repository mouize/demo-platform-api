<?php

namespace App\Models;

use ApiPlatform\Laravel\Eloquent\Filter\OrderFilter;
use ApiPlatform\Laravel\Eloquent\Filter\PartialSearchFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\QueryParameter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ApiResource(
    middleware: ['auth:sanctum']
)]
#[QueryParameter(key: 'title', filter: PartialSearchFilter::class)]
#[QueryParameter(key: 'sort[:title]', filter: OrderFilter::class)]
class Comment extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = ['post_id', 'user_id', 'content'];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
