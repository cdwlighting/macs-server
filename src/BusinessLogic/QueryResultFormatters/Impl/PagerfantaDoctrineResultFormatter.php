<?php
namespace App\BusinessLogic\QueryResultFormatters\Impl;

use App\BusinessLogic\QueryResultFormatters\PaginatedResultsFormatter;
use App\Repository\BaseRepositoryInterface;
use App\Services\URLGenerator;
use App\Services\RequestQueryParameters;
use App\Pagination\PaginatedCollection;

use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;

class PagerfantaDoctrineResultFormatter implements PaginatedResultsFormatter
{
	private $requestQueryParameters;

	public function __construct(RequestQueryParameters $requestQueryParameters)
	{
		$this->requestQueryParameters = $requestQueryParameters;
	}

	public function getList(BaseRepositoryInterface $repo, URLGenerator $urlGenerator)
	{
		$page = $this->requestQueryParameters->getCurrentPage();
		$limit = $this->requestQueryParameters->getMaxResultsPerPage();

		$adapter = new DoctrineORMAdapter($repo->getList());

		$pagerfanta = new Pagerfanta($adapter);
		$pagerfanta->setMaxPerPage($limit);
		$pagerfanta->setCurrentPage($page);

		$items = [];
		foreach($pagerfanta->getCurrentPageResults() as $result)
		{
			$items[] = $result;
		}

		$paginatedCollection = new PaginatedCollection($items, $pagerfanta->getNbResults());

		return $paginatedCollection;

	}

	public function getItem(BaseRepositoryInterface $repo, URLGenerator $urlGenerator)
	{

	}

	private function addNavigationLinks(PaginatedColelction $paginatedCollection, Pagerfanta $pagerfanta )
	{
		$createLinkUri = function($targetPage) use ($urlGenerator, $limit) {
			return $urlGenerator->getListUrl($targetPage, $limit);
		};

		$paginatedCollection->addLink('first', $createLinkUri(1));
		$paginatedCollection->addLink('last', $createLinkUri($pagerfanta->getNbPagers()));

		if($pagerFanta->hasNextPage()) {
			$paginatedCollection->addLink('next', $createdLinkUri($pagerfanta->getNextPage()));
		}

		if($pagerFanta->hasPreviousPage()) {
			$paginatedCollection->addLink('prev', $createLinkUri($pagerfanta->getPreviousPage()));
		}

	}
}