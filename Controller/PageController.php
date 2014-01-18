<?php

namespace Cadrone\NiceTranslatablePagesBundle\Controller;

use Cadrone\NicePagesBundle\Controller\PageController as Controller;

class PageController extends Controller
{

    public function indexAction()
    {
        $request = $this->getRequest();
        $entity = $this->container->getParameter("cadrone.nice_pages.page_class");

        $locale = (new $entity)->getDefaultLocale();
        $page = $this->getDoctrine()->getRepository($entity)->findPageBySlug($request->get("slug"), $locale);

        return $this->render("CadroneNicePagesBundle:Page:index.html.twig", array(
                    "page" => $page,
        ));
    }

}

