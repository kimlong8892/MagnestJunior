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

namespace Magenest\ChapterFour\Ui\DataProvider\Product\Form\Modifier;


use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AbstractModifier;
use Magento\Ui\Component\Form\Element\DataType\Date;
use Magento\Ui\Component\Form\Element\DataType\Text;
use Magento\Ui\Component\Form\Fieldset;
use Magento\Ui\Component\Form\Element\Select;
use Magento\Ui\Component\Form\Field;




class Fields extends AbstractModifier
{
    public function modifyMeta(array $meta)
    {
        $meta = array_replace_recursive(
            $meta,
            [
                'magenest' => [
                    'arguments' => [
                        'data' => [
                            'config' => [
                                'label' => __('Magenest Custom Fields'),
                                'collapsible' => true,
                                'componentType' => Fieldset::NAME,
                                'dataScope' => 'data.magenest',
                                'sortOrder' => 10
                            ],
                        ],
                    ],
                    'children' => $this->getFields()
                ],
            ]
        );

        return $meta;
    }
    protected function getFields()
    {
        return [
            'date_example'    => [
                'arguments' => [
                    'data' => [
                        'config' => [
                            'label'         => __('Date Example'),
                            'componentType' => Field::NAME,
                            'formElement'   => Date::NAME,
                            'dataScope'     => 'date_example',
                            'sortOrder'     => 10,
                            'component' => 'Magenest_ChapterFour/js/form/components/date',
                        ],
                    ],
                ],
            ],
            'status'    => [
                'arguments' => [
                    'data' => [
                        'config' => [
                            'label'         => __('Status'),
                            'componentType' => Field::NAME,
                            'formElement'   => Select::NAME,
                            'dataScope'     => 'status',
                            'dataType'      => Text::NAME,
                            'sortOrder'     => 10,
                            'options'       => [
                                ['value' => '0', 'label' => __('Inactive')],
                                ['value' => '1', 'label' => __('Active')]
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    public function modifyData(array $data)
    {
        return $data;
    }
}
