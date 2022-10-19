<?php

namespace Modules\School\Entities;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class School
 *
 * @property int             $id
 * @property string          $acronym
 * @property string          $name
 * @property-read SchoolType $schoolType
 * @property-read Collection $schoolYears
 * @property-read Collection $schoolAccounts
 * @property-read Collection $departments
 * @property-read Collection $sections
 * @property-read Collection $students
 * @property int $school_type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read int|null $departments_count
 * @property-read int|null $school_accounts_count
 * @property-read int|null $school_years_count
 * @property-read int|null $sections_count
 * @property-read int|null $students_count
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\School newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\School newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\School query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\School whereAcronym($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\School whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\School whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\School whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\School whereSchoolTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\School whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\School\Entities\SchoolVoterAccount[] $schoolVoterAccounts
 * @property-read int|null $school_voter_accounts_count
 */
class School extends Model
{
    protected $fillable = ['acronym', 'name'];

    public function schoolType()
    {
        return $this->belongsTo(SchoolType::class);
    }

    public function schoolYears()
    {
        return $this->hasMany(SchoolYear::class);
    }

    public function schoolVoterAccounts()
    {
        return $this->hasMany(SchoolVoterAccount::class);
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
