<?php


class Product extends ProductCore
{
    public $micampocustom;

    public function __construct($id_product = null, $full = false, $id_lang = null, $id_shop = null, Context $context = null)
    {
        self::$definition['fields']['micampocustom'] = array(
            'type' => self::TYPE_STRING, 'validate' => 'isGenericName', 'size' => 255);

            parent::__construct($id_product, $full, $id_lang, $id_shop, $context);

        
    }
}