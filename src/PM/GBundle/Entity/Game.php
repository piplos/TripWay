<?php

namespace PM\GBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Game
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    protected $startedAt;

    protected $finishedAt;


    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}