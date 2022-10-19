<?php

namespace Modules\School\Tests\Unit\Entities;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\School\Entities\Section;
use Modules\School\Entities\YearSection;
use Modules\School\Tests\Helpers\SchemaMaker;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use RefreshDatabase, SchemaMaker;

    /**
     * @test
     */
    public function hasExpectedColumns(): void
    {
        $this->assertTrue(
            \Schema::hasColumns('students', [
                'id', 'first_name', 'middle_name', 'last_name', 'school_id', 'school_year_section_id'
            ]),
            1
        );
    }

    /**
     * @test
     */
    public function belongsToYearSection(): void
    {
        $yearSection = $this->createYearSection();
        $student = $this->createStudent($yearSection);

        $this->assertInstanceOf(YearSection::class, $student->yearSection);
    }

    /**
     * @test
     */
    public function belongsToSection(): void
    {
        $yearSection = $this->createYearSection();
        $student = $this->createStudent($yearSection);

        $this->assertInstanceOf(Section::class, $student->section);
    }
}
