<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Ramsey\Uuid\Uuid;

/**
 * @class Outfit
 * @mixin Builder
 *
 * @property-read UUID $outfit_id
 * @property string $link
 * @property string $submitter_id
 * @property string $tag
 * @property string $meta
 * @property string $discord_name
 * @property boolean $is_deleted
 * @property boolean $is_featured
 * @property int $display_count
 * @property string|null $delete_hash
 * @property string $file_name
 *
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 */
#[Fillable([
    'link',
    'submitter_id',
    'tag',
    'meta',
    'discord_name',
    'is_deleted',
    'is_featured',
    'display_count',
    'delete_hash',
    'file_name',
])]
#[Table(key: 'outfit_id', keyType: 'string')]
class Outfit extends Model
{
    use HasUuids;

    protected $casts = [
        'is_deleted' => 'boolean',
        'is_featured' => 'boolean',
    ];

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'submitter_id', 'discord_snowflake');
    }
}
