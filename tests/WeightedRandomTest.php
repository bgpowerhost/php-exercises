<?php

namespace Tests;

class WeightedRandomTest extends TestCase
{
    const HANDLER_CLASS = 'GrupoMedia\\Exercises\\WeightedRandom\\Handler';

    public function testWeightMap()
    {
        $handler = $this->createHandler();

        $map = [
            1700    => 20,
            500     => 10,
            800     => 50,
            1337    => 70,
            619     => 30
        ];

        $output = [];

        for ($i = 0; $i < 10000; $i++) {
            $result = $handler->handle($map);

            if (!array_key_exists($result, $output)) {
                $output[$result] = 1;
            } else {
                $output[$result] += 1;
            }
        }

        // Sort the array by hits
        arsort($output, SORT_NUMERIC);
        arsort($map, SORT_NUMERIC);

        $this->assertEquals(count($map), count($output), "The output array is missing numbers.");

        $this->assertEquals(key($map), key($output));
    }
}
