<?php

namespace GreenFrog\Bundle\CmsBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use GreenFrog\Bundle\CmsBundle\Entity\Page;

class LoadPageData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $page = new Page();
        $page->setName('Home');
        $page->setSlug('home');
        $page->setStatus('online');
//        $page->setParent();
        $page->setMenuOrder(1);
        $page->setMenuActive(true);
//        $page->setLayout('page');
        $manager->persist($page);

        $page2 = new Page();
        $page2->setName('About');
        $page2->setSlug('about');
        $page2->setStatus('online');
//        $page->setParent();
        $page2->setMenuOrder(2);
        $page2->setMenuActive(true);
//        $page->setLayout('page');
        $manager->persist($page2);
        
        $page3 = new Page();
        $page3->setName('Contact');
        $page3->setSlug('contact');
        $page3->setStatus('online');
//        $page->setParent();
        $page3->setMenuOrder(3);
        $page3->setMenuActive(true);
//        $page->setLayout('page');
        $manager->persist($page3);
        
        $page4 = new Page();
        $page4->setName('Members');
        $page4->setSlug('members');
        $page4->setStatus('online');
//        $page->setParent();
        $page4->setMenuOrder(4);
        $page4->setMenuActive(true);
//        $page->setLayout('page');
        $manager->persist($page4);

        $page5 = new Page();
        $page5->setName('Search');
        $page5->setSlug('search');
        $page5->setStatus('online');
        $page5->setParent(4);
        $page5->setMenuOrder(1);
        $page5->setMenuDepth(1);
        $page5->setMenuActive(true);
//        $page->setLayout('page');
        $manager->persist($page5);

        $page6 = new Page();
        $page6->setName('Ranking');
        $page6->setSlug('ranking');
        $page6->setStatus('online');
        $page6->setParent(4);
        $page6->setMenuOrder(2);
        $page6->setMenuDepth(1);
        $page6->setMenuActive(true);
//        $page->setLayout('page');
        $manager->persist($page6);

        $manager->flush();

    }
}