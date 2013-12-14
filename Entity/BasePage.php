<?php

namespace Cadrone\NiceTranslatablePagesBundle\Entity;

use Cadrone\NicePagesBundle\Entity\PageInterface;
use Doctrine\ORM\Mapping as ORM;

abstract class BasePage implements PageInterface
{

    /**
     * @var integer $id
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __toString()
    {
        return $this->translate()->getTitle() ? : "-";
    }

    public function __call($name, $arguments)
    {
        return $this->proxyCurrentLocaleTranslation($name, $arguments);
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

    public function setTitle($title, $locale = null)
    {
        return $this->translate($locale)->setTitle($title);
    }

    public function getTitle($locale = null)
    {
        return $this->translate($locale)->getTitle();
    }

    public function setText($text, $locale = null)
    {
        return $this->translate($locale)->setText($text);
    }

    public function getText($locale = null)
    {
        return $this->translate($locale)->getText();
    }

    public function setMetaKeywords($metaKeywords, $locale = null)
    {
        return $this->translate($locale)->setMetaKeywords($metaKeywords);
    }

    public function getMetaKeywords($locale = null)
    {
        return $this->translate($locale)->getMetaKeywords();
    }

    public function setMetaDescription($metaDescription, $locale = null)
    {
        return $this->translate($locale)->setMetaDescription($metaDescription);
    }

    public function getMetaDescription($locale = null)
    {
        return $this->translate($locale)->getMetaDescription();
    }

}

