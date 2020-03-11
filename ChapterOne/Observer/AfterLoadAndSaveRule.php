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

namespace Magenest\ChapterOne\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer as EventObserver;
use Magenest\ChapterOne\Model\ResourceModel\MagenestRule;

class AfterLoadAndSaveRule implements ObserverInterface
{
    protected $date;
    protected $magenestRule;
    protected $registry;
    protected $isSave = false;
    public function __construct
    (
        \Magento\Framework\Stdlib\DateTime\DateTime $date,
        MagenestRule $magenestRule,
        \Magento\Framework\Registry $registry
    )
    {
        $this->date = $date;
        $this->magenestRule = $magenestRule;
        $this->registry = $registry;
    }

    public function execute(EventObserver $observer)
    {
        $date = $this->date->gmtDate();
        $modelRule = $observer->getDataObject();
        $eventName = $observer->getEvent()->getName();
        if($eventName == "magenest_rule_load_after"){
            $modelRule->setAfterLoad($date);
            $this->magenestRule->save($modelRule);
        } else if($eventName == "magenest_rule_save_after") {
            $modelRule->setAfterSave($date);
            if(!$this->isSave) {
                $this->isSave = true;
                $this->magenestRule->save($modelRule);
            }
        }
    }
}
