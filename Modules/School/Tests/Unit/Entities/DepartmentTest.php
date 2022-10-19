<?php

namespace Modules\School\Tests\Unit\Entities;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\School\Entities\Department;
use Modules\School\Entities\School;
use Modules\School\Tests\Helpers\SchemaMaker;
use Tests\TestCase;

class DepartmentTest extends TestCase
{
    use RefreshDatabase, SchemaMaker;

    /**
     * @test
     */
    public function hasExpectedColumns(): void
    {
        $this->assertTrue(
            \Schema::hasColumns('departments', [
                'id', 'acronym', 'name', 'school_id'
            ]),
            1
        );
    }

    /**
     * @test
     */
    public function belongsToSchool(): Department
    {
        $department = $this->createDepartment();

        // A Department is related to school
        $this->assertInstanceOf(School::class, $department->school);

        return $department;
    }

    /**
     * @test
     * @depends belongsToSchool
     *
     * @param Department $department
     */
    public function hasManyCourses(Department $department): void
    {
        $course = $this->createCourse($department);

        $this->assertHasManyModels($department->courses, $course);
    }
}
