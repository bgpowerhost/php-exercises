<?php

namespace GrupoMedia\Exercises\WeightedRandom;

/**
 * Допишете обекта като добавите метод handle(), който приема
 * нужните масив от параметри и отвръща с очаквания отговор
 */
final class Handler
{
	public function handle($input) {
		$rand = mt_rand(1, (int)array_sum($input));
		foreach ($input as $key => $value) {
			$rand -= $value;
			if($rand <= 0) {
				return $key;
			}
		}
	}
}
