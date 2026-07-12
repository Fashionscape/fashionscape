<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Ramsey\Uuid\Uuid;

/**
 * @class Gallery
 * @mixin Builder
 *
 * @property-read Uuid $gallery_id
 * @property string $server_id
 * @property string $channel_ud
 * @property string $tag
 * @property EmojiType $emoji_type
 * @property string $emoji
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
#[Fillable([
    'server_id',
    'channel_id',
    'tag',
    'emoji_type',
    'emoji'
])]
class Gallery extends Model
{
    use HasUuids;


    protected $casts = [
        'emoji_type' => EmojiType::class,
    ];
}
