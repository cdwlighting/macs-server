<?php
namespace App\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @Gedmo\Loggable
 */
class Location extends BaseModel {

	/**
	 * Title Of location
	 * @var String
	 *
	 * @ORM\Column(type="string", length=25)
	 */
	private $title;
	/**
	 * CSS class name for Location
	 * @var string
	 *
	 * @ORM\Column(type="string", length=25)
	 */
	private $className;

	/**
	 * Collection of Machines that are within this location
	 * @var ArrayCollection
	 *
	 * @ORM\OneToMany(targetEntity=Machine::class, mappedBy="location", cascade={"all"}, orphanRemoval=true, fetch="LAZY")
	 */
	private $machines;

	public function __construct() {
		$this->machines = new ArrayCollection();
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
	 *
	 * @return Location
	 */
	public function setTitle($title)
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getClassName()
	{
		return $this->className;
	}

	/**
	 * @param string
	 *
	 * @return Location
	 */
	public function setClassName($className)
	{
		$this->className = $className;

		return $this;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getMachines()
	{
		return $this->machines;
	}

	/**
	 * @param 
	 *
	 * @return  Location
	 */
	public function setMachines(ArrayCollection $machines)
	{
		$this->machines = $machines;

		return $this;
	}

	/**
	 * @param 
	 *
	 * @return  Location
	 */
	public function addMachine(Machine $machine)
	{
		$machine->setLoation($this);

		if(!$this->machines->contains($machine))
		{
			$this->machines->add($machine);
		}

		return $this;

	}

	/**
	 * @param  Machine
	 * @return Location
	 */
	public function removeMachine(Machine $machine)
	{
		if($this->machines->contains($machine))
		{
			$this->machines->remove($machine);
		}

		return $this;
	}


}