<?php

namespace Cadrone\NiceTranslatablePagesBundle\Entity;

use Cadrone\NicePagesCoreBundle\Entity\MappedPageBase;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

class BasePageTranslation extends MappedPageBase
{

    use ORMBehaviors\Translatable\Translation,
        ORMBehaviors\Sluggable\Sluggable
    ;

    public function getSluggableFields()
    {
        return ["title"];
    }

}
