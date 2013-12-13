<?php

namespace Cadrone\NiceTranslatablePagesBundle\Admin;

use Cadrone\NicePagesCoreBundle\Admin\BasePageAdmin as BaseClass;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

class PageAdmin extends BaseClass
{

    public function configureFormFields(FormMapper $form)
    {
        $text_field_type = ["field_type" => $this->getTextFieldType()];
        $text_field_config = $this->getTextFieldConfiguation($text_field_type["field_type"]);

        $form
                ->with("Page")
                ->add("translations", "a2lix_translations", [
                    "fields" => array(
                        "title" => [],
                        "text" => array_merge($text_field_type, $text_field_config),
                    ),
                ])
                ->end()
        ;
    }
}
