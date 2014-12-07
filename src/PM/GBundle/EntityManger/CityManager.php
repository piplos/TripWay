<?php

namespace PM\GBundle\EntityManager;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\SecurityContext;

/**
 * Class TaskManger
 * @package PM\GBundle\EntityManger
 */
class CityManager
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

    /**
     * Returns list of random cities
     *
     * @param int $limit
     * @return array
     */
    final public function randomCities($limit = 5) {
        return $this->em->createQuery('SELECT p, RAND() as HIDDEN rand
            FROM PMGBundle:City c
            ORDER BY rand
        ')
            ->setMaxResults($limit)
            ->getResult();
    }


}