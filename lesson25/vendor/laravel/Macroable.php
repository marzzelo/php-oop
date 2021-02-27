<?php

namespace Laravel;

use Closure;
use BadMethodCallException;

trait Macroable
{
	private static array $macros = [];

	public static function hasMacro($method): bool
	{
		return isset (static::$macros[$method]);
	}

	public static function macro($method, Closure $macro)
	{
		static::$macros[$method] = $macro;
	}

	public function __call($method, array $arguments)
	{
		if (self::hasMacro($method)) {
			return call_user_func_array(self::$macros[$method]->bindTo($this, self::class), $arguments);
		}

		throw new BadMethodCallException("The method {$method} does no exist");
	}
}