<?php

namespace GreenFrog\Bundle\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GreenFrog\Bundle\CmsBundle\Entity\Page
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="GreenFrog\Bundle\CmsBundle\Repository\PageRepository")
 */
class Page
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=80)
     */
    private $name;

    /**
     * @var string $slug
     *
     * @ORM\Column(name="slug", type="string", length=80, unique=true)
     */
    private $slug;

    /**
     * @var datetime $created_at
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $created_at;

    /**
     * @var datetime $updated_at
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updated_at;

    /**
     * @var string $status
     *
     * @ORM\Column(name="status", type="string", length=20)
     */
    private $status;

    /**
     * @var integer $parent
     *
     * @ORM\Column(name="parent", type="integer", nullable=true)
     */
    private $parent;

    /**
     * @var integer $menu_order
     *
     * @ORM\Column(name="menu_order", type="integer")
     */
    private $menu_order;

    /**
     * @var integer $menu_order
     *
     * @ORM\Column(name="menu_depth", type="integer")
     */
    private $menu_depth;

    /**
     * @var boolean $menu_active
     *
     * @ORM\Column(name="menu_active", type="boolean")
     */
    private $menu_active;

    /**
     * @var string $layout
     *
     * @ORM\Column(name="layout", type="string", length=80, nullable=true)
     */
    private $layout;

    public function __construct() {
        $this->created_at = new \DateTime('now');
        $this->updated_at = new \DateTime('now');
        $this->menu_depth = 0;
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
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * Set slug
     *
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set created_at
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    }

    /**
     * Get created_at
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    }

    /**
     * Get updated_at
     *
     * @return datetime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set status
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set parent
     *
     * @param integer $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * Get parent
     *
     * @return integer 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set menu_order
     *
     * @param integer $menuOrder
     */
    public function setMenuOrder($menuOrder)
    {
        $this->menu_order = $menuOrder;
    }

    /**
     * Get menu_order
     *
     * @return integer 
     */
    public function getMenuOrder()
    {
        return $this->menu_order;
    }

    /**
     * Set menu_active
     *
     * @param boolean $menuActive
     */
    public function setMenuActive($menuActive)
    {
        $this->menu_active = $menuActive;
    }

    /**
     * Get menu_active
     *
     * @return boolean 
     */
    public function getMenuActive()
    {
        return $this->menu_active;
    }

    /**
     * Set layout
     *
     * @param string $layout
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    /**
     * Get layout
     *
     * @return string 
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * Set menu_depth
     *
     * @param integer $menuDepth
     */
    public function setMenuDepth($menuDepth)
    {
        $this->menu_depth = $menuDepth;
    }

    /**
     * Get menu_depth
     *
     * @return integer 
     */
    public function getMenuDepth()
    {
        return $this->menu_depth;
    }
}