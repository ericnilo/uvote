<?php

namespace Modules\School\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SchoolYear
 *
 * @property int    $id
 * @property int    $from
 * @property int    $to
 * @property-read School $school
 * @property int $school_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolYear newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolYear newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolYear query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolYear whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolYear whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolYear whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolYear whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolYear whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolYear whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SchoolYear extends Model
{
    protected $fillable = ['from', 'to'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
