<?php

namespace Modules\School\Entities;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Section
 *
 * @property int        $id
 * @property string     $name
 * @property-read School     $school
 * @property-read Course     $course
 * @property-read Collection $yearSections
 * @property int $school_id
 * @property int $course_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read int|null $year_sections_count
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Section newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Section newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Section query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Section whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Section whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Section whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Section whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Section whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Section whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Section extends Model
{
    protected $fillable = ['name'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function yearSections()
    {
        return $this->hasMany(YearSection::class);
    }
}
