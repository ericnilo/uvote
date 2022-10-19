<?php

namespace Modules\School\Entities;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Department
 *
 * @property int        $id
 * @property string     $acronym
 * @property string     $name
 * @property-read School     $school
 * @property-read Collection $courses
 * @property int $school_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read int|null $courses_count
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Department newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Department newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Department query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Department whereAcronym($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Department whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Department whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Department whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Department whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Department whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Department extends Model
{
    protected $fillable = ['acronym', 'name'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
