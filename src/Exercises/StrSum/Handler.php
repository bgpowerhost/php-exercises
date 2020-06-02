<?php

namespace GrupoMedia\Exercises\StrSum;

/**
 * Допишете обекта като добавите метод handle(), който приема
 * нужните параметри и отвръща с очаквания отговор
 */
final class Handler
{
	public function handle($input) {
		$aggregate = null;
		$input_numbers = explode(',', preg_replace('/\s+/', '', $input));
		foreach($input_numbers as $number) {
			$aggregate += (int)$number;
		}
		return $aggregate;
	}
}
