<?php

namespace App\Services\Impl;

use App\Services\RequestQueryParameters;
use Symfony\Component\HttpFoundation\RequestStack;

class SymfonyRequestQueryParameters implements RequestQueryParameters
{
	private const PAGE = 'page';
	private const LIMIT = 'limit';
	
	private $requestStack;

	public function __construct(RequestStack $requestStack)
	{
		$this->requestStack = $requestStack;
	}

	public function getCurrentPage()
	{
		return $this->requestStack->getCurrentRequest()->get(self::PAGE, 1);
	}

	public function getMaxResultsPerPage()
	{
		return $this->requestStack->getCurrentRequest()->get(self::LIMIT, 10);
	}
}