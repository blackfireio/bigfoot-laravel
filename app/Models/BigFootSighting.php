<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BigFootSighting
 *
 * @property int $id
 * @property int $owner_id
 * @property string $title
 * @property string $description
 * @property int $confidence_index
 * @property int $score
 * @property string $latitude
 * @property string $longitude
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \App\Models\User $owner
 * @method static \Illuminate\Database\Eloquent\Builder|BigFootSighting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BigFootSighting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BigFootSighting query()
 * @method static \Illuminate\Database\Eloquent\Builder|BigFootSighting whereConfidenceIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BigFootSighting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BigFootSighting whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BigFootSighting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BigFootSighting whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BigFootSighting whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BigFootSighting whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BigFootSighting whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BigFootSighting whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BigFootSighting whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BigFootSighting extends Model
{
    use HasFactory;

    protected $table = 'big_foot_sighting';

    public function comments()
    {
        return $this->hasMany(Comment::class, 'big_foot_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
