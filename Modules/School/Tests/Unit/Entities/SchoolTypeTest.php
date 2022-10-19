<?php

namespace Modules\School\Tests\Unit\Entities;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\School\Entities\School;
use Modules\School\Entities\SchoolType;
use Modules\School\Tests\Helpers\SchemaMaker;
use Tests\TestCase;

/**
 * Class SchoolTypeTest
 *
 * @covers SchoolType
 */
class SchoolTypeTest extends TestCase
{
    use RefreshDatabase, SchemaMaker;

    /**
     * @test
     */
    public function hasExpectedColumns(): void
    {
        $this->assertTrue(
            \Schema::hasColumns('school_types', [
                'id', 'name'
            ]), 1);
    }

    /**
     * @test
     */
    public function hasManySchools(): void
    {
        $schoolType = $this->createSchoolType();
        $school = $this->createSchool($schoolType);

        $this->assertHasManyModels($schoolType->schools, $school);
    }
}
