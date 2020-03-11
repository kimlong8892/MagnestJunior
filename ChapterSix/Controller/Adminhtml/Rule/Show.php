<?php


namespace Magenest\ChapterSix\Controller\Adminhtml\Rule;
use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class Show extends Action
{
    protected $pageFactory;
    public function __construct
    (
        PageFactory $pageFactory,
        Action\Context $context
    )
    {
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        return $this->pageFactory->create();
    }
}
