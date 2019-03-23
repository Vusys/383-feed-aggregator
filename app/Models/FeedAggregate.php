<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\FeedAggregate
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Feed[] $feeds
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FeedAggregate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FeedAggregate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FeedAggregate query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FeedAggregate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FeedAggregate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FeedAggregate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FeedAggregate whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FeedAggregate whereUpdatedAt($value)
 */
class FeedAggregate extends Model
{
    protected $fillable = ['name', 'slug'];

    public function feeds(): BelongsToMany
    {
        return $this->belongsToMany(Feed::class);
    }
}
