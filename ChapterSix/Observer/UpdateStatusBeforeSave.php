<?php


namespace Magenest\ChapterSix\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer as EventObserver;

class UpdateStatusBeforeSave implements ObserverInterface
{
    protected $ruleRepository;
    public function __construct
    (
        \Magenest\ChapterSix\Api\RuleRepositoryInterface $ruleRepositoryInterface
    )
    {
        $this->ruleRepository = $ruleRepositoryInterface;
    }

    public function execute(EventObserver $observer)
    {
        $modelRule = $observer->getDataObject();
        $this->ruleRepository->setStatus('status'.rand(0, 99));
    }
}
