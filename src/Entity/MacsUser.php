<?php
namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 */
class MacUser extends BaseUser
{
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue(stratgy="SEQUENCE")
	 * @ORM\Column(type="integer")
	 * @ORM\SequenceGenerator(sequenceName="master_seq", iniitalValue=1)
	 * 
	 */
	protected $id;

	/**
	 *  @Gedmo\Timestampable(on="create")
	 *  @ORM\Column(type="datetime")
	 */
	private $createdAt;
	/**
	 *  @Gedmo\Timestampable(on="change")
	 *  @ORM\Column(type="datetime")
	 */
	private $updatedAt;

	public function __construct()
	{
		parent::__construct();
	}
}