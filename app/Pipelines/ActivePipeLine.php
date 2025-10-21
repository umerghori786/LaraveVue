<?php

namespace App\Pipelines;

class ActivePipeLine
{
	public function __construct(private $string){}

	public function __invoke($query,$next)
	{	
		if(is_null($this->string))
		{
			return $next($query);
		}

		$query->where('status',$this->string);
		return $next($query);
	}
}