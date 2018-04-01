<?php
namespace App\Repository\Impl;

use App\Repository\MemberRepository;
use App\Entity\Member;
use Doctrine\ORM\EntityManagerInterface;
use App\Services\RequestQueryParameters;


class DoctrineMemberRepository implements MemberRepository
{
	private $manager;
	private $repo;

	public function __construct(EntityManagerInterface $manager)
	{
		$this->manager = $manager;
		$this->repo = $manager->getRepository(Member::class);
	}

	public function getList()
	{

		$qb = $this->repo->createQueryBuilder('m');
		
		return $qb;

	}

	public function findById($id)
	{
		return $this->repo->findOnBy(['id' => $id]);
	}

	public function save($member)
	{
		$this->manager->persist($member);
		$this->manager->flush();
	}

}