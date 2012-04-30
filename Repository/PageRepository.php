<?php

namespace GreenFrog\Bundle\CmsBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * PageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PageRepository extends EntityRepository
{
    public function getNavMenu() {
        $nav = array();
        
        //- Max 2 DEPTH
        $pages = $this->getPagesByDepth(0);
        $childPages = $this->getPagesByDepth(1);

        //- We need a special route for home
        foreach ($pages as $page) {
            $slug = $page->getSlug() == 'home' ? '' : $page->getSlug();

            $childs = array();
            foreach($childPages as $c) {
                if($c->getParent() == $page->getId()) {
                    $childs[] = array(
                        'id' => $c->getId(),
                        'name' => $c->getName(),
                        'slug' => $c->getSlug(),
                    );
                }
            }
            $nav[] = array(
                'id' => $page->getId(),
                'name' => $page->getName(),
                'slug' => $slug,
                'childs' => $childs,
            );
        }

        return $nav;
    }

    public function getPagesByDepth($depth) {
        $pages = $this->createQueryBuilder('n')
            ->andWhere('n.status = ?1')
            ->andWhere('n.menu_active = ?2')
            ->andWhere('n.menu_depth = ?3')
            ->addOrderBy('n.menu_order')
            ->setParameter(1, 'online')
            ->setParameter(2, true)
            ->setParameter(3, $depth)
            ->getQuery()->getResult();   
        return $pages;
    }

    public function getBreadcrumb($page) {
        $ancestor = ($page->getMenuDepth() != 0) ? $page->getParent() : null;
        
        if($this->isHome($page)) {
            $bc = array(
                array(
                    'name' => 'Home',
                    'slug' => 'home',
                    'is_last' => true,
                )
            );
        } elseif (!$ancestor) {
            $bc = array(
                array(
                    'name' => 'Home',
                    'slug' => 'home',
                    'is_last' => false,
                ),
                array(
                    'name' => $page->getName(),
                    'slug' => $page->getSlug(),
                    'is_last' => true,
                ),
            );
        } elseif($ancestor) {
            $ancestor = $this->find($ancestor);
            $bc = array(
                array(
                    'name' => 'Home',
                    'slug' => 'home',
                    'is_last' => false,
                ),
                array(
                    'name' => $ancestor->getName(),
                    'slug' => $ancestor->getSlug(),
                    'is_last' => false,
                ),
                array(
                    'name' => $page->getName(),
                    'slug' => $page->getSlug(),
                    'is_last' => true,
                ),
            );
        }
        return $bc;
    }
    
    public function isHome($page) {
        return ($page->getSlug() == 'home') ? true : false;
    }
}