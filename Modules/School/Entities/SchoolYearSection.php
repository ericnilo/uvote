<?php

namespace Modules\School\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SchoolYearSection
 *
 * @property int         $id
 * @property-read Student     $student
 * @property-read YearSection $yearSection
 * @property-read SchoolYear  $schoolYear
 * @property int $student_id
 * @property int $year_section_id
 * @property int $school_year_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolYearSection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolYearSection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolYearSection query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolYearSection whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolYearSection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolYearSection whereSchoolYearId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolYearSection whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolYearSection whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolYearSection whereYearSectionId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\School\Entities\Student[] $students
 * @property-read int|null $students_count
 */
class SchoolYearSection extends Model
{
    public function yearSection()
    {
        return $this->belongsTo(YearSection::class);
    }

    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class);
    }
}
