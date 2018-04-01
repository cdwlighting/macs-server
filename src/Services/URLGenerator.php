<?php
namespace App\Services;

interface URLGenerator {
	public function getListURL($page, $maxPage = 10);
	public function getItemURL($item);

}