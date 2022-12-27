<?php

namespace Newnet\Dashboard\Models;

use Illuminate\Database\Eloquent\Model;
use Newnet\Core\Support\Traits\CacheableTrait;

/**
 * Newnet\Dashboard\Models\Dashboard
 *
 * @property int $id
 * @property string|null $author_type
 * @property int|null $author_id
 * @property string $class_name
 * @property int|null $sort_order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $author
 * @method static \Rinvex\Cacheable\EloquentBuilder|\Newnet\Dashboard\Models\Dashboard newModelQuery()
 * @method static \Rinvex\Cacheable\EloquentBuilder|\Newnet\Dashboard\Models\Dashboard newQuery()
 * @method static \Rinvex\Cacheable\EloquentBuilder|\Newnet\Dashboard\Models\Dashboard query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Newnet\Dashboard\Models\Dashboard whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Newnet\Dashboard\Models\Dashboard whereAuthorType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Newnet\Dashboard\Models\Dashboard whereClassName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Newnet\Dashboard\Models\Dashboard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Newnet\Dashboard\Models\Dashboard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Newnet\Dashboard\Models\Dashboard whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Newnet\Dashboard\Models\Dashboard whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Dashboard extends Model
{
    use CacheableTrait;

    protected $fillable = [
        'class_name',
        'sort_order',
    ];

    public function author()
    {
        return $this->morphTo();
    }
}
