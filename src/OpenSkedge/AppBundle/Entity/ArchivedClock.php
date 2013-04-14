<?php
// src/OpenSkedge/AppBundle/Entity/ArchivedClock.php
namespace OpenSkedge\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="os_archived_clock", indexes={@ORM\Index(name="week", columns={"week"})})
 * @ORM\Entity()
 */
class ArchivedClock extends BaseEntity\RecordBaseEntity
{
    /**
     * @ORM\Column(name="id", type="integer", unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="archivedClocks")
     * @ORM\JoinColumn(name="uid", referencedColumnName="id")
     **/
    private $user;

    /**
     * @ORM\Column(type="datetime")
     */
    private $week;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function getData()
    {
        return array(str_split($this->getSun()), str_split($this->getMon()), str_split($this->getTue()), str_split($this->getWed()), str_split($this->getThu()), str_split($this->getFri()), str_split($this->getSat()));
    }

    /**
     * Set user
     *
     * @param \OpenSkedge\AppBundle\Entity\User $user
     * @return ArchivedClock
     */
    public function setUser(\OpenSkedge\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \OpenSkedge\AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set week
     *
     * @param \DateTime $week
     * @return ArchivedClock
     */
    public function setWeek($week)
    {
        $this->week = $week;

        return $this;
    }

    /**
     * Get week
     *
     * @return \DateTime
     */
    public function getWeek()
    {
        return $this->week;
    }
}
