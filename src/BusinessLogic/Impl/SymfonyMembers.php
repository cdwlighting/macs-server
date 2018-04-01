<?php
namespace App\BusinessLogic\Impl;

use App\BusinessLogic\Members;
use App\BusinessLogic\QueryResultFormatters\PaginatedResultsFormatter;
use App\Repository\MemberRepository;
use App\Services\MemberURLGenerator;

class SymfonyMembers implements Members
{
	private $repository;
	private $urlGenerator;
	private $paginatedResultsFormatter;

	public function __construct(MemberRepository $repository, MemberURLGenerator $urlGenerator, PaginatedResultsFormatter $paginatedResultsFormatter)
	{
		$this->repository = $repository;
		$this->urlGenerator = $urlGenerator;
		$this->paginatedResultsFormatter = $paginatedResultsFormatter;
	}

	public function getListing()
	{
	
		return $this->paginatedResultsFormatter->getList($this->repository, $this->urlGenerator);
	}

	public function getItem($id)
	{

	}

	public function canMemberUseMachine($memberId, $machineId)
	{
		
	}
}