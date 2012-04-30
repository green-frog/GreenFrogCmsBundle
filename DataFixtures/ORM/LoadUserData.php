<?php

namespace GreenFrog\Bundle\CmsBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use FOS\UserBundle\Entity\UserManager;

class LoadUserData implements FixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    
    public function load(ObjectManager $manager)
    {
        $userManager = $this->container->get('fos_user.user_manager');

        $user = $userManager->createUser();
        $user->setUsername('user');
        $user->setEmail('user@mail.com');
        $user->setPlainPassword('test');
        $user->setEnabled(true);
        $userManager->updateUser($user);
        
        $admin = $userManager->createUser();
        $admin->setUsername('admin');
        $admin->setEmail('admin@mail.com');
        $admin->setPlainPassword('test');
        $admin->setEnabled(true);
        $admin->setRoles(array('ROLE_SUPER_ADMIN'));
        $userManager->updateUser($admin);
//        
//        $admin = $userManager->createUser();
//        $admin->setUsername('admin');
//        $admin->setEmail('admin@mail.com');
//        $admin->setPlainPassword('test');
//        $admin->setEnabled(true);
//        $admin->setRoles(array('ROLE_SUPER_ADMIN'));
//        $userManager->updateUser($admin);

    }
}