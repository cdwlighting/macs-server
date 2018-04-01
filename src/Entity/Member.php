<?php
namespace App\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @Gedmo\Loggable
 */
class Member extends BaseModel {
	/**
	 * @ORM\Column(type="integer")
	 * @Gedmo\Versioned
	 */
	private $AMemberId;

	/**
	 * @ORM\Column(type="integer")
	 * @Gedmo\Versioned
	 */
	private $rfId;

	/**
	 * @ORM\Column(type="datetime")
	 * @Gedmo\Versioned
	 */
	private $validUntil;

	/**
	 * @ORM\OneToMany(targetEntity=MachinePermission::class, cascade={"persist", "remove"}, orphanRemoval=true, mappedBy="member", fetch="LAZY")
	 */
	private $machinePermissions;

	public function  __construct()
	{
		$this->machinePermissions = new ArrayCollection();
	}

	/**
	 * @return integer
	 */
	public function getAMemberId()
	{
		return $this->AMemberId;
	}

	/**
	 * @param Member
	 */
	public function setAMemberId($AMemberId)
	{
		$this->AMemberId = $AMemberId;
		return $this;
	}

	/**
	 * @return integer
	 */
	public function getRfId()
	{
		return $this->rfId;
	}

	/**
	 * @param integer
	 */
	public function setRfId($rfid)
	{
		$this->rfId = $rfid;

		return $this;
	}

	/**
	 * @return DateTime
	 */
	public function getValidUntil()
	{
		return $this->validUntil;
	}

	/**
	 * @param DateTime
	 * @return Member
	 */
	public function setValidUntil($validUntil)
	{
		$this->validUntil = $validUntil;

		return $this;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getMachinePermissions()
	{
		return $this->machinePermissions;
	}

	/**
	 * @param 
	 * @return Member
	 */
	public function setMachinePermissions(ArrayCollection $machinePermissions)
	{
		$this->machinePermissions = $machinePermissions;

		return $this;
	}

	/**
	 * @param MachinePermission
	 * @return Member
	 */
	public function addMachinePermission(MachinePermission $machinePermission)
	{
		$machinePermission->setmember($this);
		if(!$this->machinePermissions->contains($machinePermission))
		{
			$this->machinePermissions->add($machinePermission);
		}

		return $this;

	}

	/**
	 * @param  MachinePermission
	 * @return Member
	 */
	public function removeMachinePermission(MachinePermission $machinePermission)
	{
		if($this->machinePermissions->contains($machinePermission))
		{
			$this->machinePermissions->remove($machinePermission);
		}

		return $this;
	}
}