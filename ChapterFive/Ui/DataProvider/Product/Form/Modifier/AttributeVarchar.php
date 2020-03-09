<?php
/**
 * Copyright © 2020 Magenest. All rights reserved.
 * See COPYING.txt for license details.
 *
 * Magenest_junior extension
 * NOTICE OF LICENSE
 *
 * @category Magenest
 * @package  Magenest_junior
 */

namespace Magenest\ChapterFive\Ui\DataProvider\Product\Form\Modifier;
use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AbstractModifier;

class AttributeVarchar extends AbstractModifier
{
    public function modifyMeta(array $meta)
    {
        return $meta;
    }

    public function modifyData(array $data)
    {
        if(isset($data[array_key_first($data)]['product']['sample_varchar'])) {
            $temp = explode("+",$data[array_key_first($data)]['product']['sample_varchar']);
            $data[array_key_first($data)]['product']['sample_varchar'] = $temp[0];
            $data[array_key_first($data)]['product']['sample_varchar'] = $temp[0];
        }
        return $data;
    }
}
