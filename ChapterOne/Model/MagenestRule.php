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

namespace Magenest\ChapterOne\Model;


class MagenestRule extends \Magento\Framework\Model\AbstractModel
{
    protected $_eventPrefix = 'magenest_rule';
    protected function _construct()
    {
        $this->_init('Magenest\ChapterOne\Model\ResourceModel\MagenestRule');
    }
}
