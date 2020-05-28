<?php declare(strict_types=1);

namespace Tests;

final class StrRevText extends TestCase
{
    const HANDLER_CLASS = 'GrupoMedia\\Exercises\\StrSum\\Handler';

    public function testUserInput()
    {
        $handler = $this->createHandler();

        $input = "1 ,2,3, 4, 5,6, 7";

        $this->assertEquals(28, $handler->handle($input));
    }

    public function testOutsideCondition()
    {
        $handler = $this->createHandler();

        $input = "3,4,5 ,5, 2, 1, 5, 7, 8,12";

        $this->assertEquals(52, $handler->handle($input));
    }
}
