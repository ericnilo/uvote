<?php

namespace Modules\School\Entities;

use Illuminate\Database\Eloquent\Model;
use Znck\Eloquent\Traits\BelongsToThrough;

/**
 * Class Student
 *
 * @property int $id
 * @property string $firstName
 * @property string $middleName
 * @property string $lastName
 * @property-read School $school
 * @property-read SchoolYearSection $schoolYearSection
 * @property-read YearSection $yearSection
 * @property-read Section $section
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property int $school_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Student newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Student newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Student query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Student whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Student whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Student whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Student whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Student whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Student whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Student whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Student extends Model
{
    use BelongsToThrough;

    protected $fillable = ['first_name', 'last_name', 'middle_name'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function schoolYearSection()
    {
        return $this->belongsTo(SchoolYearSection::class);
    }

    public function yearSection()
    {
        return $this->belongsToThrough(YearSection::class, SchoolYearSection::class);
    }

    public function section()
    {
        return $this->belongsToThrough(Section::class, [YearSection::class, SchoolYearSection::class]);
    }
}
