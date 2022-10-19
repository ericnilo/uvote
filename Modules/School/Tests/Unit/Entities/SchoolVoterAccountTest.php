<?php

namespace Modules\School\Tests\Unit\Entities;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\School\Entities\School;
use Modules\School\Entities\SchoolVoterAccount;
use Modules\School\Tests\Helpers\SchemaMaker;
use Tests\TestCase;

class SchoolVoterAccountTest extends TestCase
{
    use RefreshDatabase, SchemaMaker;

    /**
     * @var SchoolVoterAccount
     */
    private $schoolAccount;

    protected function setUp(): void
    {
        parent::setUp();

        $this->schoolAccount = $this->createSchoolVoterAccount();
    }

    /**
     * @test
     */
    public function hasExpectedColumns(): void
    {
        $this->assertTrue(
            \Schema::hasColumns('school_voter_accounts', [
                'id', 'password', 'username', 'school_id', 'voter_id'
            ]),
            1
        );
    }

    /**
     * @test
     */
    public function belongsToSchool(): void
    {
        // A School Account is related to school
        $this->assertInstanceOf(School::class, $this->schoolAccount->school);
    }
}
