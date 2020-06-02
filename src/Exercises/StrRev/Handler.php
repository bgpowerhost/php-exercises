<?php

namespace GrupoMedia\Exercises\StrRev;

/**
 * Допишете обекта като добавите метод handle(), който приема
 * нужните параметри и отвръща с очаквания отговор
 */
final class Handler
{
	public function handle($input) {
		$reverse_input = null;
		for($i = 100 ; $i >= 0 ; $i--) {
			if(strlen($input) >= $i) {;
				$reverse_input .= mb_substr($input, abs($i), 1, "utf-8");
			}
		}
		return $reverse_input;
		
	}
}
