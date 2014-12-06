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
     * @ORM\Column(type="datetime")
     */
    protected $updatedAt;

    /**
     * @ORM\Column(type="integer")
     */
    protected $value;

    public function __construct() {

        $this->updatedAt = new \DateTime();

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
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Score
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set value
     *
     * @param integer $value
     * @return Score
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return integer 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set user
     *
     * @param \PM\GBundle\Entity\User $user
     * @return Score
     */
    public function setUser(\PM\GBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \PM\GBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add game
     *
     * @param \PM\GBundle\Entity\Game $game
     * @return Score
     */
    public function addGame(\PM\GBundle\Entity\Game $game)
    {
        $this->game[] = $game;

        return $this;
    }

    /**
     * Remove game
     *
     * @param \PM\GBundle\Entity\Game $game
     */
    public function removeGame(\PM\GBundle\Entity\Game $game)
    {
        $this->game->removeElement($game);
    }

    /**
     * Get game
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGame()
    {
        return $this->game;
    }
}
