<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Feed
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\FeedAggregate[] $aggregates
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Feed newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Feed newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Feed query()
 * @mixin \Eloquent
 * @property int                                                                       $id
 * @property string                                                                    $url
 * @property string                                                                    $parser
 * @property int                                                                       $refresh_length Period to wait before refreshing the feed, in seconds
 * @property string|null                                                               $last_checked
 * @property \Illuminate\Support\Carbon|null                                           $created_at
 * @property \Illuminate\Support\Carbon|null                                           $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Feed whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Feed whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Feed whereLastChecked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Feed whereParser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Feed whereRefreshLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Feed whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Feed whereUrl($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Location[]      $locations
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Feed needsRefresh()
 */
class Feed extends Model
{
    protected $fillable = ['parser', 'refresh_length', 'url'];

    public function aggregates(): BelongsToMany
    {
        return $this->belongsToMany(FeedAggregate::class);
    }

    public function locations(): HasMany
    {
        return $this->hasMany(Location::class);
    }

    public function scopeNeedsRefresh(Builder $query): Builder
    {
        return $query->whereRaw('DATE_SUB(last_checked, INTERVAL refresh_length SECOND) >= last_checked')
            ->orWhereNull('last_checked');
    }
}
