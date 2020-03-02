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

class CustomerTypeColumn extends Select
{
    protected $customerGroup;
    public function __construct
    (
        \Magento\Customer\Model\ResourceModel\Group\Collection $customerGroup,
        \Magento\Framework\View\Element\Context $context,
        array $data = []
    )
    {
        $this->customerGroup = $customerGroup;
        parent::__construct($context, $data);
    }

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
        $data = $this->customerGroup->toOptionArray();
        return $data;
    }
}
