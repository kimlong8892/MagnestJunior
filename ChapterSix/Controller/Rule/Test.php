<?php


namespace Magenest\ChapterSix\Controller\Rule;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magenest\ChapterOne\Model\MagenestRule as ModelRule;

class Test extends Action
{
    protected $pageFactory;
    protected $ruleRepository;
    protected $modelRule;
    public function __construct
    (
        PageFactory $pageFactory,
        \Magenest\ChapterSix\Api\RuleRepositoryInterface $ruleRepositoryInterface,
        ModelRule $modelRule,
        Context $context
    )
    {
        $this->pageFactory = $pageFactory;
        $this->ruleRepository = $ruleRepositoryInterface;
        $this->modelRule = $modelRule;
        parent::__construct($context);
    }

    public function execute()
    {
        $modelRule2 = $this->ruleRepository->loadById(2);
//        $this->ruleRepository->setTitle('asdasdasd'.rand(1, 100));
//        $this->ruleRepository->save();
//        $modelRule3 = $this->ruleRepository->loadById(3);
//        $modelRule4 = $this->ruleRepository->loadById(4);
    }
}
