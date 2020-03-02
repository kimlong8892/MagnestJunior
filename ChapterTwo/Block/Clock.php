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

namespace Magenest\ChapterTwo\Block;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;
use Magento\Store\Model\ScopeInterface;

class Clock extends Template
{
    protected $scopeConfig;
    public function __construct
    (
        ScopeConfigInterface $scopeConfig,
        Template\Context $context, array $data = []
    )
    {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    public function getConfigClock()
    {
        $path = 'clock/config_text/';
        return [
            'text_color' => $this->scopeConfig->getValue($path.'text_color'),
            'clock_color' => $this->scopeConfig->getValue($path.'clock_color'),
            'title_clock' => $this->scopeConfig->getValue($path.'title_clock'),
        ];
    }
}
