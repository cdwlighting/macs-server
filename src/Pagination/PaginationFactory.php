<?php
namespace App\Pagination;

use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;


interface PaginationFactory 
{
	public function createCollection( )
}