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

namespace Magenest\ChapterFive\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer as EventObserver;

class SaveVarChar implements ObserverInterface
{
    public function execute(EventObserver $observer)
    {
        $product = $observer->getProduct();
        $varchar = $product->getSampleVarchar();
        $varchar .= "+varchar(".strlen($varchar).")";
        $product->setSampleVarchar($varchar);
        $observer->setProduct($product);
    }
}
