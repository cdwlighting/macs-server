<?php
namespace App\Repository;

interface BaseRepositoryInterface {
	function getList();
	function findById($id);
	function save($item);
}