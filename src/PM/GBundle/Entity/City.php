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
     * @ORM\OneToMany(targetEntity="PM\GBundle\Entity\Task", inversedBy="city", cascade={"persist","remove"} )
     */
    protected $tasks;

    /**
     * @var \Datetime
     */
    protected $updatedAt;

}