<?php

namespace App\BusinessLogic;

interface Members {
	public function getListing();
	public function getItem($id);
	public function canMemberUseMachine($memberId, $machineId);
}