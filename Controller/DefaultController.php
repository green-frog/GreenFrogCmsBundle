<?php

namespace GreenFrog\Bundle\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use GreenFrog\Bundle\CmsBundle\Entity\Page;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function indexAction()
    {
        return $this->navigationAction('home');
    }
    /**
     * @Route("/{slug}", name="navigation", requirements={"slug" = ".+"})
     * @Template()
     */
    public function navigationAction($slug)
    {
        // TODO: i18n with php_intl
        //- Removing SEO / to get real slug
        $sluggy = explode('/', $slug);
        $slug = $sluggy[count($sluggy)-1];

        $page = $this->get('green_frog_cms.page_manager')->loadPageBySlug($slug);
        $breadcrumb = $this->get('green_frog_cms.page_manager')->getRepository()->getBreadcrumb($page);

        // TODO : 404 &| sitemap page
        if(!$page) {
            throw new NotFoundHttpException('The page "'.$slug.'" doesnt not exist');
        }
        
        // TODO : set layouts

        return array(
            'gf_cms' => $this->getVars(),
            'breadcrumb' => $breadcrumb,
            'page' => $page,
        );
    }
    /**
     * @Route("/{name}/{action}", name="bundle")
     * @Template()
     */
    public function bundleAction($name, $action)
    {
        // TODO: implement bundle
        return array(
            'gf_cms' => $this->getVars(),
        );
    }

    /*
     * Return CMS config vars
     */
    private function getVars() {
        return $this->container->getParameter('green_frog_cms');
    }

    /*
     * TODO : Return Actual page or bundle
     */
//    private function getActive() {
////        $route = $this->getRequest()->attributes->get('_route');
////        return $route;
//    }
}
