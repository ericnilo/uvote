<?php

namespace Tests;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * @param Collection|Model|mixed $modelCollection
     * @param $expectedModel
     */
    protected function assertHasManyModels($modelCollection, $expectedModel): void
    {
        // Count that a $modelCollection collection exists.
        $this->assertEquals(1, $modelCollection->count());

        // The $expectedModel exists in $modelCollection.
        $this->assertTrue($modelCollection->contains($expectedModel));

        // $modelCollection is a collection instance.
        $this->assertInstanceOf(Collection::class, $modelCollection);
    }
}
