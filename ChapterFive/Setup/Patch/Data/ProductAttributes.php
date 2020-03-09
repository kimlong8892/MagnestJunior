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

namespace Magenest\ChapterFive\Setup\Patch\Data;


use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Catalog\Model\Product\Attribute\Source\Boolean as SourceBoolean;
use Magento\Catalog\Model\Product\Attribute\Backend\Boolean as BackendBoolean;

class ProductAttributes implements DataPatchInterface
{
    /**
     * @var EavSetupFactory
     */
    protected $eavSetupFactory;

    /**
     * @var ModuleDataSetupInterface
     */
    protected $moduleDataSetup;

    /**
     * CreateIsMagicConfigurableProductAttribute constructor.
     * @param EavSetupFactory $eavSetupFactory
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(EavSetupFactory $eavSetupFactory, ModuleDataSetupInterface $moduleDataSetup)
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->moduleDataSetup = $moduleDataSetup;
    }

    /**
     * @inheritdoc
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function apply()
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);

        $eavSetup->addAttribute(
            Product::ENTITY,
            'customer_group',
            [
                'type' => 'text',
                'frontend' => '',
                'label' => 'Customer Group',
                'input' => 'select',
                'source' => 'Magenest\ChapterFive\Model\Config\Source\Options',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => true,
                'user_defined' => false,
                'default' => 2,
                'unique' => false,
                'apply_to' => '',
                'used_in_product_listing' => true,
                'searchable' => true,
				'filterable' => true,
				'comparable' => true,
                'is_used_in_grid' => true
            ]
        )->addAttribute(\Magento\Catalog\Model\Product::ENTITY,
            'sample_varchar',
            [
                'type' => 'varchar',
                'backend' => '',
                'frontend' => '',
                'label' => 'Sample Varchar',
                'input' => 'text',
                'class' => '',
                'source' => '',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => false,
                'default' => 'varchar example',
                'unique' => false,
                'apply_to' => ''
            ]
        );
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);
        $fieldList = [
            'price',
            'special_price',
            'special_from_date',
            'special_to_date',
            'minimal_price',
            'cost',
            'tier_price',
        ];

        foreach ($fieldList as $field) {
            $applyTo = explode(
                ',',
                $eavSetup->getAttribute(\Magento\Catalog\Model\Product::ENTITY, $field, 'apply_to')
            );
            if (!in_array('example_product_type', $applyTo)) {
                $applyTo[] = 'example_product_type';
                $eavSetup->updateAttribute(
                    \Magento\Catalog\Model\Product::ENTITY,
                    $field,
                    'apply_to',
                    implode(',', $applyTo)
                );
            }
        }
    }
}
