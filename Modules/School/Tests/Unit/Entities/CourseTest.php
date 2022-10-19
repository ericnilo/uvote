<?php

namespace Modules\School\Tests\Unit\Entities;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\School\Entities\Course;
use Modules\School\Entities\Department;
use Modules\School\Tests\Helpers\SchemaMaker;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use RefreshDatabase, SchemaMaker;

    /**
     * @test
     */
    public function hasExpectedColumns(): void
    {
        $this->assertTrue(
            \Schema::hasColumns('courses', [
                'id', 'acronym', 'name', 'department_id'
            ]),
            1
        );
    }

    /**
     * @test
     */
    public function belongsToDepartment(): Course
    {
        $course = $this->createCourse();

        $this->assertInstanceOf(Department::class, $course->department);

        return $course;
    }

    /**
     * @test
     * @depends belongsToDepartment
     *
     * @param Course $course
     */
    public function hasManySections(Course $course): void
    {
        $section = $this->createSection($course);

        $this->assertHasManyModels($course->sections, $section);
    }
}
