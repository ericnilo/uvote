<?php

namespace Modules\School\Tests\Unit\Entities;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\School\Entities\Course;
use Modules\School\Entities\Department;
use Modules\School\Entities\School;
use Modules\School\Entities\SchoolVoterAccount;
use Modules\School\Entities\SchoolType;
use Modules\School\Entities\SchoolYear;
use Modules\School\Entities\Section;
use Modules\School\Entities\Student;
use Modules\School\Tests\Helpers\SchemaMaker;
use Tests\TestCase;

/**
 * Class SchoolTest
 *
 * @covers School
 */
class SchoolTest extends TestCase
{
    use RefreshDatabase, SchemaMaker;

    /**
     * @test
     */
    public function hasExpectedColumns(): void
    {
        $this->assertTrue(
            \Schema::hasColumns('schools', [
                'id', 'acronym', 'name', 'school_type_id', 'account_id'
            ]),
            1
        );
    }

    /**
     * @test
     *
     * @return School
     */
    public function belongsToSchoolType(): School
    {
        $school = $this->createSchool();

        // A school type is related to school
        $this->assertInstanceOf(SchoolType::class, $school->schoolType);

        return $school;
    }

    /**
     * @test
     * @depends belongsToSchoolType
     *
     * @param School $school
     */
    public function hasManySchoolYears(School $school): void
    {
        $schoolYear = $this->createSchoolYear($school);

        $this->assertHasManyModels($school->schoolYears, $schoolYear);
    }

    /**
     * @test
     * @depends belongsToSchoolType
     * @depends hasManyStudents
     *
     * @param School  $school
     */
    public function hasManySchoolAccounts(School $school): void
    {
        $schoolAccount = $this->createSchoolVoterAccount();

        $this->assertHasManyModels($school->schoolAccounts, $schoolAccount);
    }

    /**
     * @test
     * @depends belongsToSchoolType
     *
     * @param School $school
     *
     * @return Department
     */
    public function hasManyDepartments(School $school): Department
    {
        $department = $this->createDepartment($school);

        $this->assertHasManyModels($school->departments, $department);

        return $department;
    }

    /**
     * @test
     * @depends belongsToSchoolType
     *
     * @param School $school
     *
     * @return Student
     */
    public function hasManyStudents(School $school): Student
    {
        $student = $this->createStudent($school);

        $this->assertHasManyModels($school->students, $student);

        return $student;
    }

    /**
     * @test
     * @depends belongsToSchoolType
     * @depends hasManyDepartments
     *
     * @param School $school
     * @param Department $department
     */
    public function hasManySections(School $school, Department $department): void
    {
        $course = $this->createCourse($department);
        $section = $this->createSection($course);

        $this->assertHasManyModels($school->sections, $section);
    }
}
