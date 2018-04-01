<?php
namespace App\Services;

interface RequestQueryParameters {
	public function getCurrentPage();
	public function getMaxResultsPerPage();
}