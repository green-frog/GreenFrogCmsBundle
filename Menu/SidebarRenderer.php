<?php

namespace GreenFrog\Bundle\CmsBundle\Menu;

use Knp\Menu\ItemInterface;
use Knp\Menu\Renderer\TwigRenderer;

class SidebarRenderer extends TwigRenderer
{
    public function render(ItemInterface $item, array $options = array())
    {
        $options = array_merge(
            array(
                'currentClass' => 'active',
                'ancestorClass' => 'active',
            ),
            $options
        );
        
//        if ('root' === $item->getName()) {
//            $item->setAttribute('class', trim('nav '.$item->getAttribute('class')));
//        }
        
        $item->setChildrenAttribute('class', trim('nav nav-list'.$item->getAttribute('class')));
        
        return parent::render($item, $options);
    }
}