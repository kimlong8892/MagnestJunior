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

namespace Magenest\ChapterFive\Model\Config\Source;
use Magento\Customer\Model\ResourceModel\Group\Collection as CollectionCustomerGroup;

class Options extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    protected $collectionCustomerGroup;
    public function __construct
    (
        CollectionCustomerGroup $collectionCustomerGroup
    )
    {
        $this->collectionCustomerGroup = $collectionCustomerGroup;
    }

    /**
     * Get all options
     *
     * @return array
     */
    public function getAllOptions()
    {
        $this->_options = $this->collectionCustomerGroup->toOptionArray();
        return $this->_options;
    }
}
