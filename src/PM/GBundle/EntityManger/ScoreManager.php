<?php

namespace PM\GBundle\EntityManger;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\SecurityContext;

/**
 * Class TaskManger
 * @package PM\GBundle\EntityManger
 */
class ScoreManager
{

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var SecurityContext
     */
    private $securityContext;

    /**
     * @var \Doctrine\ORM\EntityRepository
     */
    private $repository;

    /**
     * @var string
     */
    private $class;

    /**
     * @param $class
     * @param EntityManager $em
     * @param SecurityContext $securityContext
     */
    public function __construct($class, EntityManager $em, SecurityContext $securityContext) {

        $this->em = $em;
        $this->class = $class;
        $this->repository = $this->em->getRepository($this->class);
        $this->securityContext = $securityContext;

    }

    /**
     * Creates new task object
     *
     * @return mixed
     */
    final public function create()
    {
        return new $this->class;
    }


}