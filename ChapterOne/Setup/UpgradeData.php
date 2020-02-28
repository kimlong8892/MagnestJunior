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

namespace Magenest\ChapterOne\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\App\ProductMetadataInterface;
use Magenest\ChapterOne\Model\ResourceModel\MagenestRule\CollectionFactory;
use Magenest\ChapterOne\Model\ResourceModel\MagenestRule;
use Magento\Framework\Serialize\Serializer\Json;
use Magento\Framework\Serialize\Serializer\Serialize;

class UpgradeData implements UpgradeDataInterface
{
    protected $productMetadata;
    protected $collectionFactory;
    protected $resourceMagenestRule;
    protected $json;
    protected $serialize;
    public function __construct
    (
        ProductMetadataInterface $productMetadata,
        CollectionFactory $collectionFactory,
        MagenestRule $resourceMagenestRule,
        Json $json,
        Serialize $serialize
    )
    {
        $this->productMetadata = $productMetadata;
        $this->collectionFactory = $collectionFactory;
        $this->resourceMagenestRule = $resourceMagenestRule;
        $this->serialize = $serialize;
        $this->json = $json;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $collectionRule = $this->collectionFactory->create();
        if($collectionRule->count() > 0){
            if($this->productMetadata->getVersion() < 2.2){
                forEach($collectionRule as $item){
                    $decode = $this->json->unserialize($item->getConditionsSerialized());
                    $item->setConditionsSerialized($this->serialize->serialize($decode));
                    $this->resourceMagenestRule->save($item);
                }
            } else {
                forEach($collectionRule as $item){
                    $unserialize = $this->serialize->unserialize($item->getConditionsSerialized());
                    $item->setConditionsSerialized($this->json->serialize($unserialize));
                    $this->resourceMagenestRule->save($item);;
                }
            }
        }
    }
}
