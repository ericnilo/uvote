<?php

namespace Modules\School\Entities;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SchoolType
 *
 * @property int             $id
 * @property string          $name
 * @property-read Collection $schools
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read int|null $schools_count
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SchoolType extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name'];

    public function schools()
    {
        return $this->hasMany(School::class);
    }
}
