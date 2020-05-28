<?php

namespace Tests;

use ReflectionMethod;
use SplFileObject;

final class StrRevTest extends TestCase
{
    const HANDLER_CLASS = 'GrupoMedia\\Exercises\\StrRev\\Handler';

    public function testBasicRev()
    {
        $handler = $this->createHandler();

        $input = 'Пловдив столица на културата';
        $expected = 'атарутлук ан ацилотс видволП';

        return $this->assertEquals($expected, $handler->handle($input));
    }

    public function testSomethingElse()
    {
        $handler = $this->createHandler();
        $randomString = $this->generateRandomStr(16);
        $reversed = strrev($randomString);

        return $this->assertEquals($reversed, $handler->handle($randomString));
    }

    public function testLoopExistence()
    {
        $method = new ReflectionMethod(self::HANDLER_CLASS, 'handle');

        $f = $method->getFileName();
        $startLine = $method->getStartLine() - 1;
        $endLine = $method->getEndLine();

        $functionText = '';
        $file = new SplFileObject($f);

        $file->seek($startLine);

        while ($file->key() < $endLine) {
            $functionText .= $file->fgets();
        }

        $this->assertTrue(mb_strpos($functionText, 'for(') || mb_strpos($functionText, 'for ('), "Your StrRev does not container FOR loop.");
    }

    private function generateRandomStr($length = 30)
    {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
}
