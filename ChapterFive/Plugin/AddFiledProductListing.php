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

namespace Magenest\ChapterFive\Plugin;

use Magento\Catalog\Ui\DataProvider\Product\ProductDataProvider;

class AddFiledProductListing
{
    public function afterGetData(ProductDataProvider $subject, $result)
    {
        $a = $result;



        return $result;
    }
}
