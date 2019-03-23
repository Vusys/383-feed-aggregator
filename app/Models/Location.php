<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Location
 *
 * @property int $id
 * @property int $feed_id
 * @property string $name
 * @property string $description
 * @property string $link
 * @property string $image
 * @property float|null $latitude
 * @property float|null $longitude
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Feed $feed
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location whereFeedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Location whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Location extends Model
{
    protected $fillable = ['name', 'description', 'link', 'image', 'latitude', 'longitude'];

    public function feed(): BelongsTo
    {
        return $this->belongsTo(Feed::class);
    }
}
