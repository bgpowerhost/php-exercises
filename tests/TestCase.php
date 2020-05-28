<?php

namespace Tests;

use ReflectionClass;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

abstract class TestCase extends PHPUnitTestCase
{
    const HANDLER_CLASS = 'weird file';

    public function testHasFunctioningHandler()
    {
        $this->assertTrue(class_exists(static::HANDLER_CLASS));
    }

    public function testHasHandleMethod()
    {
        $reflection = new ReflectionClass(static::HANDLER_CLASS);

        $this->assertTrue($reflection->hasMethod('handle'), "Your handler class has no handle method!");
    }

    protected function createHandler()
    {
        $reflection = new ReflectionClass(static::HANDLER_CLASS);

        return $reflection->newInstance();
    }
}
