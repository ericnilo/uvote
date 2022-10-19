<?php

namespace Modules\School\Entities;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Modules\School\Entities\Course
 *
 * @property int $id
 * @property string $acronym
 * @property string $name
 * @property int $department_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\School\Entities\Department $department
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\School\Entities\Section[] $sections
 * @property-read int|null $sections_count
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Course query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Course whereAcronym($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Course whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Course whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\Course whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Course extends Model
{
    protected $fillable = ['acronym', 'name'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
