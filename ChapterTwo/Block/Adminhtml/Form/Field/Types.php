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


use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magenest\ChapterTwo\Block\Adminhtml\Form\Field\CustomerTypeColumn;
use Magenest\ChapterTwo\Block\Adminhtml\Form\Field\ClockTypeColumn;
use Magento\Framework\DataObject;


class Types extends AbstractFieldArray
{
    private $typeCustomerRender;
    private $typeClockRender;
    protected function _prepareToRender()
    {
        $this->addColumn('customer_group_column', ['label' => __('Customer Group'), 'renderer' => $this->getCustomerTypeRenderer()]);
        $this->addColumn('clock_type', ['label' => __('Clock Type'), 'renderer' => $this->getClockTypeRenderer()]);
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add Type');
    }
    private function getCustomerTypeRenderer()
    {
        if (!$this->typeCustomerRender) {
            $this->typeCustomerRender = $this->getLayout()->createBlock(
                CustomerTypeColumn::class,
                'type_customer.config',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->typeCustomerRender;
    }
    private function getClockTypeRenderer()
    {
        if(!$this->typeClockRender){
            $this->typeClockRender = $this->getLayout()->createBlock(
                ClockTypeColumn::class,
                'type_clock.config',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->typeClockRender;
    }
    protected function _prepareArrayRow(DataObject $row)
    {

        $options = [];

//        $typeCustomer = $row->getCustomerGroup();
//        if ($typeCustomer !== null) {
//            $options['option_' . $this->getCustomerTypeRenderer()->calcOptionHash($typeCustomer)] = 'selected="selected"';
//        }

        $row->setData('option_extra_attrs', $options);
    }

}
