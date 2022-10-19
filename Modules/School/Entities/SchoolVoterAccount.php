<?php

namespace Modules\School\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SchoolVoterAccount
 *
 * @property int     $id
 * @property string  $username
 * @property string  $password
 * @property-read School  $school
 * @property-read Student $student
 * @property int $school_id
 * @property int $student_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolVoterAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolVoterAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolVoterAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolVoterAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolVoterAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolVoterAccount wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolVoterAccount whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolVoterAccount whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolVoterAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\School\Entities\SchoolVoterAccount whereUsername($value)
 * @mixin \Eloquent
 */
class SchoolVoterAccount extends Model
{
    protected $fillable = ['password', 'username'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
