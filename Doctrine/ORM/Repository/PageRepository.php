<?php

namespace Cadrone\NiceTranslatablePagesBundle\Doctrine\ORM\Repository;

use Cadrone\NicePagesBundle\Doctrine\ORM\Repository\PageRepositoryInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class PageRepository extends EntityRepository implements PageRepositoryInterface
{

    /**
     *
     * @param string $slug page slug
     * @param string $locale page locale
     * @return Cadrone\NiceTranslatablePagesBundle\Entity\BasePage
     */
    public function findPageBySlug($slug, $locale = "en")
    {
        $page = $this->createQueryBuilder("p")
                ->join("p.translations", "pt")
                ->where("pt.slug = :slug")
                ->andWhere("pt.locale = :locale")
                ->setParameters(array(
                    "slug" => $slug,
                    "locale" => $locale,
                ))
                ->getQuery()
                ->getSingleResult()
        ;

        $page->setLocale($locale);

        return $page;
    }

}

