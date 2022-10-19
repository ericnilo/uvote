<?php

namespace Modules\School\Tests\Unit\Entities;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\School\Entities\Section;
use Modules\School\Entities\Student;
use Modules\School\Entities\YearSection;
use Modules\School\Tests\Helpers\SchemaMaker;
use Tests\TestCase;

class YearSectionTest extends TestCase
{
    use RefreshDatabase, SchemaMaker;

    /**
     * @var YearSection
     */
    private $yearSection;

    /**
     * @var Student
     */
    private $student;

    protected function setUp(): void
    {
        parent::setUp();

        $this->yearSection = $this->createYearSection();

        $school = $this->yearSection->section->school;
        $schoolYear = $this->createSchoolYear($school);

        $this->student = $this->createStudent($school);

        $this->createSchoolYearSection($this->student, $this->yearSection, $schoolYear);
    }

    /**
     * @test
     */
    public function hasExpectedColumns(): void
    {
        $this->assertTrue(
            \Schema::hasColumns('year_sections', [
                'id', 'year_section', 'section_id'
            ]),
            1
        );
    }

    /**
     * @test
     */
    public function belongsToSection(): void
    {
        $this->assertInstanceOf(Section::class, $this->yearSection->section);
    }

    /**
     * @test
     */
    public function hasManyStudents(): void
    {
        $this->assertHasManyModels($this->yearSection->students, $this->student);
    }
}
