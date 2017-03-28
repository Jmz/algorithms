<?php

namespace Algorithms;

class Fermat
{
	/**
	 * Check if the supplied number is prime using the Fermat Primality Test (https://en.wikipedia.org/wiki/Fermat_primality_test)
	 *
	 * Luckily we can use the BC Math package in PHP (http://php.net/manual/en/function.bcpowmod.php) as PHPs native integer handling
	 * falls down pretty quickly when we do these calculations.
	 *
	 * @param $check
	 * @return bool
	 */
	public function isPrime($check)
	{
		$tests = [2, 3, 4, 5, 6, 7, 8, 9, 10];

		foreach($tests as $test) {
			if ((int) bcpowmod($test, ($check - 1), $check) !== 1) {
				return false;
			}
		}

		return true;
	}
}
