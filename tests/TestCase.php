<?php

namespace Slvler\Ether\Tests;

use Slvler\Ether\EtherServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            EtherServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
    }
}
