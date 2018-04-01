<?php
namespace App\Services\Impl;

use App\Services\MemberURLGenerator;
use App\Entity\Member;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class SymfonyMemberURLGenerator implements MemberURLGenerator {
	private const LIST_URL = 'api_members_collection';
	private const ITEM_URL = '';

	private $router;

	public function __construct(UrlGeneratorInterface $router)
	{
		$this->router = $router;
	}

	public function getListURL($page, $maxPage = 10)
	{
		return $this->router->generate(
			LIST_URL,
			[
				'page' => $page,
				'maxPage' => $maxPage
			]
		);
	}

	public function getItemURL($member)
	{
		return $this->router->generate(
			ITEM_URL,
			[
				'member' => $member->getId()
			]
		);
	}

}