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

namespace Magenest\ChapterTwo\Block\Adminhtml\Form\Field;
use Magento\Framework\View\Element\Html\Select;

class ClockTypeColumn extends Select
{
    public function setInputName($value)
    {
        return $this->setName($value);
    }
    public function setInputId($value)
    {
        return $this->setId($value);
    }

    public function _toHtml()
    {
        if (!$this->getOptions()) {
            $this->setOptions($this->getSourceOptions());
        }
        return parent::_toHtml();
    }

    private function getSourceOptions()
    {
        return [
            ['value' => 1, 'label' => __('Type 1')],
            ['value' => 2, 'label' => __('Type 2')],
            ['value' => 3, 'label' => __('Type 3')]
        ];
    }
}
