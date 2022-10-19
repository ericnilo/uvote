<?php

namespace Modules\School\Tests\Unit\Entities;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\School\Entities\Course;
use Modules\School\Entities\School;
use Modules\School\Entities\Section;
use Modules\School\Tests\Helpers\SchemaMaker;
use Tests\TestCase;

class SectionTest extends TestCase
{
    use RefreshDatabase, SchemaMaker;

    /**
     * @var Section
     */
    private $section;

    protected function setUp(): void
    {
        parent::setUp();

        $this->section = $this->createSection();
    }

    /**
     * @test
     */
    public function belongsToSchool(): void
    {
        $this->assertInstanceOf(School::class, $this->section->school);
    }

    /**
     * @test
     * @depends belongsToSchool
     */
    public function belongsToCourse(): void
    {
        $this->assertInstanceOf(Course::class, $this->section->course);
    }

    /**
     * @test
     * @depends belongsToSchool
     */
    public function hasManyYearSections(): void
    {
        $yearSections = $this->createYearSection($this->section);

        $this->assertHasManyModels($this->section->yearSections, $yearSections);
    }
}
