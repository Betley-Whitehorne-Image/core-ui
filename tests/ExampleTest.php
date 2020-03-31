<?php

namespace Riclep\Core\Tests;

use Orchestra\Testbench\TestCase;
use Riclep\Core\CoreServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [CoreServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
