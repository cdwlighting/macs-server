<?php
namespace App\BusinessLogic\QueryResultFormatters;

use App\Repository\BaseRepositoryInterface;
use App\Services\URLGenerator;

interface PaginatedResultsFormatter
{
	public function getList(BaseRepositoryInterface $repo, URLGenerator $urlGenerator);
	public function getItem(BaseRepositoryInterface $repo, URLGenerator $urlGenerator);
}