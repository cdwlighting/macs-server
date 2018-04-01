<?php
namespace App\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @Gedmo\Loggable
 */
class MachinePermission extends BaseModel {

	/**
	 * @ORM\ManyToOne(targetEntity=Machine::class, cascade={"all"}, fetch="LAZY", inversedBy="machinePermissions")
	 */
	private $machine;

	/**
	 * @ORM\ManyToOne(targetEntity=Member::class, cascade={"all"}, fetch="LAZY", inversedBy="machinePermissions")
	 */
	private $member;

	/**
	 * Can member use the given machine
	 * 
	 * @var boolean
	 *
	 * @ORM\Column(type="boolean")
	 * @Gedmo\Versioned
	 */
	private $canUse = false;
	

	/**
	 * @return Machine
	 */
	public function getMachine()
	{
		return $this->machine;
	}

	/**
	 * @param  $machine Machine
	 *
	 * @return MachinePermission
	 */
	public function setMachine(Machine $machine)
	{
		$this->machine = $machine;

		return $this;
	}

	/**
	 * @return Member
	 */
	public function getMember()
	{
		return $this->member;
	}

	/**
	 * @param Member $member
	 * @return MachinePermission
	 */
	public function setMember(Member $member)
	{
		$this->member = $member;

		return $this;
	}

	/**
	 * @return boolean
	 */
	public function canUse()
	{
		return $this->canUSe;
	}

	/**
	 * @param boolean $canUse
	 *
	 * @retrun MachinePermission
	 */
	public function setCanUse($canUse)
	{
		$this->canUse = $canUse;

		return $This;
	}
}