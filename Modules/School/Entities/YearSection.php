<?php

namespace Modules\School\Entities;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class YearSection
 *
 * @property int $id
 * @property int $yearSection
 * @property-read Section $section
 * @property-read Collection $students
 * @property int $year_section
 * @property int $section_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\YearSection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\YearSection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\YearSection query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\YearSection whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\YearSection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\YearSection whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\YearSection whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\YearSection whereYearSection($value)
 * @mixin \Eloquent
 * @property-read int|null $students_count
 */
class YearSection extends Model
{
    protected $fillable = ['section_year'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function students()
    {
        return $this->belongsToMany(
            Student::class,
            'student_year_sections'
        );
    }
}
