<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'submitter_id', 'discord_snowflake');
    }
}
