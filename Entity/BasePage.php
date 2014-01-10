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

    /**
     * Current locale
     */
    protected $locale;

    public function __toString()
    {
        return $this->translate()->getTitle() ? : "-";
    }

    public function __call($name, $arguments)
    {
        return $this->proxyCurrentLocaleTranslation($name, $arguments);
    }

    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    public function getLocale()
    {
        return $this->locale;
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

    public function getTitle()
    {
        return $this->translate($this->locale)->getTitle();
    }

    public function getText()
    {
        return $this->translate($this->locale)->getText();
    }

    public function getMetaKeywords()
    {
        return $this->translate($this->locale)->getMetaKeywords();
    }

    public function getMetaDescription()
    {
        return $this->translate($this->locale)->getMetaDescription();
    }

}

