<?php

namespace Modules\School\Tests\Helpers;

use Modules\School\Entities\Course;
use Modules\School\Entities\Department;
use Modules\School\Entities\School;
use Modules\School\Entities\SchoolType;
use Modules\School\Entities\SchoolVoterAccount;
use Modules\School\Entities\SchoolYear;
use Modules\School\Entities\SchoolYearSection;
use Modules\School\Entities\Section;
use Modules\School\Entities\Student;
use Modules\School\Entities\YearSection;

trait SchemaMaker
{
    protected function createSchoolType(): SchoolType
    {
        return factory(SchoolType::class)->create([
            'name' => 'test school type name'
        ]);
    }

    /**
     * @param SchoolType|null $schoolType
     *
     * @return School
     * @todo After working on Account module account_id must be dynamic
     */
    protected function createSchool(SchoolType $schoolType = null): School
    {
        if ($schoolType === null) {
            $schoolType = $this->createSchoolType();
        }

        return factory(School::class)->create([
            'acronym' => 'TS',
            'name' => 'test school',
            'school_type_id' => $schoolType->id,
            'account_id' => 1
        ]);
    }

    protected function createSchoolYear(School $school = null): SchoolYear
    {
        if ($school === null) {
            $school = $this->createSchool();
        }

        return factory(SchoolYear::class)->create([
            'from' => '2020',
            'to' => '2021',
            'school_id' => $school->id
        ]);
    }

    /**
     * @param School|null $school
     *
     * @return SchoolVoterAccount
     * @todo After working on Election module voter_id must be dynamic
     */
    protected function createSchoolVoterAccount(School $school = null): SchoolVoterAccount
    {
        if ($school === null) {
            $school = $this->createSchool();
        }

        return factory(SchoolVoterAccount::class)->create([
            'username' => 'test_username',
            'password' => 'test_password',
            'school_id' => $school->id,
            'voter_id' => 1
        ]);
    }

    protected function createDepartment(School $school = null): Department
    {
        if ($school === null) {
            $school = $this->createSchool();
        }

        return factory(Department::class)->create([
            'acronym' => 'TD',
            'name' => 'Test Department',
            'school_id' => $school->id
        ]);
    }

    protected function createCourse(Department $department = null): Course
    {
        if ($department === null) {
            $department = $this->createDepartment();
        }

        return factory(Course::class)->create([
            'acronym' => 'TC',
            'name' => 'Test Course',
            'department_id' => $department->id
        ]);
    }

    protected function createSection(Course $course = null): Section
    {
        if ($course === null) {
            $course = $this->createCourse();
        }

        $schoolId = $course->department->school_id;

        return factory(Section::class)->create([
            'name' => 'test section',
            'school_id' => $schoolId,
            'course_id' => $course->id
        ]);
    }

    protected function createYearSection(Section $section = null): YearSection
    {
        if ($section === null) {
            $section = $this->createSection();
        }

        return factory(YearSection::class)->create([
            'year_section' => 1,
            'section_id' => $section->id
        ]);
    }

    protected function createStudent(
        YearSection $yearSection = null,
        SchoolYearSection $schoolYearSection = null
    ): Student {
        if ($yearSection === null) {
            $yearSection = $this->createYearSection();
        }

        $section = $yearSection->section;
        $school = $yearSection->section->school;

        if ($schoolYearSection === null) {
            $schoolYearSection = $this->createSchoolYearSection($section, $yearSection);
        }

        return factory(Student::class)->create([
            'first_name' => 'test first name',
            'middle_name' => 'test middle name',
            'last_name' => 'test last name',
            'school_id' => $school->id,
            'school_year_section_id' => $schoolYearSection->id
        ]);
    }

    protected function createSchoolYearSection(
        Section $section = null,
        YearSection $yearSection = null,
        SchoolYear $schoolYear = null
    ): SchoolYearSection {
        if ($section === null) {
            $section = $this->createSection();
        }

        $school = $section->school;

        if ($yearSection === null) {
            $yearSection = $this->createYearSection($section);
        }

        if ($schoolYear === null) {
            $schoolYear = $this->createSchoolYear($school);
        }

        return factory(SchoolYearSection::class)->create([
            'year_section_id' => $yearSection->id,
            'school_year_id' => $schoolYear->id
        ]);
    }
}
