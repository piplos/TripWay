<?php

namespace PM\GBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Score
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="PM\GBundle\Entity\User", inversedBy="id")
     */
    protected $user;

    /**
     * @ORM\ManyToMany(targetEntity="PM\GBundle\Entity\Game", inversedBy="")
     */
    protected $game;

    /**
     * @var \Datetime
     */
    protected $updatedAt;

    /**
     * @ORM\Column(type="integer")
     */
    protected $value;
}