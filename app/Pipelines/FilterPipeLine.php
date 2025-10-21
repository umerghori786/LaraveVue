<?php

namespace App\Pipelines;

class FilterPipeLine
{
	public function __construct(private $string){}

	public function __invoke($query,$next)
	{	
		if(! $this->string)
		{
			return $next($query);
		}

		$query->where('title','like',"%$this->string%");
		return $next($query);
	}
}