<?php

namespace Cadrone\NiceTranslatablePagesBundle\Entity;

use Cadrone\NicePagesBundle\Entity\MappedPageBase;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

class BasePageTranslation extends MappedPageBase
{

    use ORMBehaviors\Translatable\Translation;

    public function __construct()
    {
        parent::__construct();
    }

}
