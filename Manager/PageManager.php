<?php

namespace GreenFrog\Bundle\CmsBundle\Manager;

use Doctrine\ORM\EntityManager;
use GreenFrog\Bundle\CmsBundle\Manager\BaseManager;
use GreenFrog\Bundle\CmsBundle\Entity\Page;

class PageManager extends BaseManager
{
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function loadPage($id) {
        return $this->getRepository()->find($id);
    }

    public function loadPageBySlug($slug) {
        return $this->getRepository()->findOneBySlug($slug);
    }

    public function savePage(Page $page)
    {
        $this->persistAndFlush($page);
    }

    public function getRepository()
    {
        return $this->em->getRepository('GreenFrogCmsBundle:Page');
    }
}