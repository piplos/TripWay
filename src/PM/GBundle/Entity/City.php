<?php

namespace PM\GBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class City
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\OneToOne(targetEntity="PM\GBundle\Entity\Coordinate", inversedBy="id")
     */
    protected $coordinates;
    
    /**
     * @ORM\OneToMany(targetEntity="PM\GBundle\Entity\Task", mappedBy="id")
     */
    protected $tasks;

    /**
     * @var \Datetime
     */
    protected $updatedAt;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tasks = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return City
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set coordinates
     *
     * @param \PM\GBundle\Entity\Coordinate $coordinates
     * @return City
     */
    public function setCoordinates(\PM\GBundle\Entity\Coordinate $coordinates = null)
    {
        $this->coordinates = $coordinates;

        return $this;
    }

    /**
     * Get coordinates
     *
     * @return \PM\GBundle\Entity\Coordinate 
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * Add tasks
     *
     * @param \PM\GBundle\Entity\Task $tasks
     * @return City
     */
    public function addTask(\PM\GBundle\Entity\Task $tasks)
    {
        $this->tasks[] = $tasks;

        return $this;
    }

    /**
     * Remove tasks
     *
     * @param \PM\GBundle\Entity\Task $tasks
     */
    public function removeTask(\PM\GBundle\Entity\Task $tasks)
    {
        $this->tasks->removeElement($tasks);
    }

    /**
     * Get tasks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTasks()
    {
        return $this->tasks;
    }
}
