<?php
// src/Acme/DemoBundle/Menu/Builder.php
namespace GreenFrog\Bundle\CmsBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $pages = $this->container->get('green_frog_cms.page_manager')->getRepository()->getNavMenu();

        $menu = $factory->createItem('root');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());

        //- Building menu from database
        foreach($pages as $page) {
            //- If childs => Dropdown menu
            if(count($page['childs']) != 0) {
                $child = $menu->addChild($page['name'], array('uri' => '#'));
                //- If linked element, add link
                if($page['slug'] != '') {
                    $child2 = $child->addChild($page['name'], array(
                        'route' => 'navigation',
                        'routeParameters' => array('slug' => $page['slug']),
                    ));
//                    $child2->setAttribute('id', 'page-'.$page['id']);
                }
                foreach($page['childs'] as $c) {
                    $child2 = $child->addChild($c['name'], array(
                        'route' => 'navigation',
                        'routeParameters' => array('slug' => $page['slug'].'/'.$c['slug']),
//                        'routeParameters' => array('slug' => $c['slug']),
                    ));
//                    $child2->setAttribute('id', 'page-'.$c['id']);
                }
                $child->setAttribute('class', 'dropdown');
                $child->setLinkAttribute('class', 'dropdown-toggle');
                $child->setLinkAttribute('data-toggle', 'dropdown');
                $child->setChildrenAttribute('class', 'dropdown-menu');

            } else {
                //- Just a simple link
                $child = $menu->addChild($page['name'], array(
                    'route' => 'navigation',
                    'routeParameters' => array('slug' => $page['slug']),
                ));
            }
            
            //- Id for every pages
//            $child->setAttribute('id', 'page-'.$page['id']);
        }

        return $menu;
    }
    public function sidebarMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());

        $child = $menu->addChild('Friends');
        $child->setAttribute('class', 'nav-header');
        
        $child = $menu->addChild('Manage', array(
            'route' => 'bundle',
            'routeParameters' => array(
                'name' => 'friends',
                'action' => 'manage',
            ),
        ));
        
        // TODO : Implement submenu possibily for childs
//        $pages = $this->container->get('green_frog_cms.page_manager')->getRepository()->getNavMenu();

        return $menu;
    }

}