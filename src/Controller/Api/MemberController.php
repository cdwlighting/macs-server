<?php
	namespace App\Controller\Api;

	use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use FOS\RestBundle\Controller\Annotations as Rest;
	use FOS\RestBundle\Controller\FOSRestController;
	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Component\HttpFoundation\Response;
	use FOS\RestBundle\View\View;

	use App\Entity\Machine;
	use App\BusinessLogic\Members;
	
	class MemberController extends FOSRestController
	{
		private $membersBo;

		public function __construct(Members $members)
		{
			$this->membersBo = $members;
		}

		/**
		 * @Rest\Get("/api/members", name="api_members_collection")
		 */
		public function getAction()
		{
			return $this->view($this->membersBo->getListing(), 200);
		}
	}