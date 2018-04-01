<?php
namespace App\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @Gedmo\Loggable
 */
class Machine extends BaseModel {

	/**
	 * @ORM\Column(type="integer")
	 * @Gedmo\Versioned
	 */
	private $macsId;
	/**
	 * @ORM\Column(type="string", length=50)
	 * @Gedmo\Versioned
	 */
	private $type;

	/**
	 * Location this machine belongs too.
	 * @var Location
	 *
	 * @ORM\ManyToOne(targetEntity=Location::class, cascade={"all"}, inversedBy="machines")
	 */
	private $location;
	/**
	 * @ORM\Column(type="string", length=25)
	 * @Gedmo\Versioned
	 */
	private $title;
	/**
	 * @ORM\Column(type="string", length=120)
	 * @Gedmo\Versioned
	 */
	private $description;

		/**
	 * @ORM\OneToMany(targetEntity=MachinePermission::class, cascade={"persist", "remove"}, orphanRemoval=true, mappedBy="machine", fetch="LAZY")
	 */
	private $machinePermissions;


	public function __construct()
	{
		$this->machinePermissions = new ArrayCollection();
	}

	/**
	 * @return integer
	 */
	public function getMacsId()
	{
		return $this->macsId;
	}

	/**
	 * @param integer
	 *
	 * @return  Machine
	 */
	public function setMacsId($macsId)
	{
		$this->macsId = $macsId;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * @param string
	 *
	 * @return  Machine
	 */
	public function setType($type)
	{
		$this->type = $type;

		return $this;
	}

	/**
	 * @return Location
	 */
	public function getLocation()
	{
		return $this->location;
	}

	/**
	 * @param Location
	 * @return  Machine
	 */
	public function setLocation(Location $location)
	{
		$this->location = $location;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param string
	 * @return Machine
	 */
	public function setTitle($title)
	{
		$this->title = $title;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param string
	 * @return  Machine
	 */
	public function setDescription($description)
	{
		$this->description = $description;

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
	 * @return Machine
	 */
	public function setMachinePermissions(ArrayCollection $machinePermissions)
	{
		$this->machinePermissions = $machinePermissions;

		return $this;
	}

	/**
	 * @param MachinePermission
	 *
	 * @return Machine
	 */
	public function addMachinePermissions(MachinePermission $machinePermission)
	{
		$machinePermission->setMachine($this);

		if(!$this->machinePermissions->contains($machinePermission))
		{
			$this->machinePermissions->add($machinePermission);
		}

		return $this;
	}

	/**
	 * @param  MachinePermission
	 * @return Machine;
	 */
	public function removeMachinePermissions(MachinePermission $machinePermission)
	{
		$machinePermission-setMachine($this);
		if($this->machinePermissions->contains($machinePermission))
		{
			$this->machinePermissions->remove($machinePermission);
		}

		return $this;
	}
}