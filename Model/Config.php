<?php
namespace EcommPro\AjaxCartSwatches\Model;

class Config
{
    const XML_PATH_IS_ENABLED = 'ecommpro_ajaxcartswatches/main/enabled';

    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Psr\Log\LoggerInterface $logger
    )
    {
        $this->scopeConfig = $scopeConfig;
        $this->logger = $logger;
    }

    public function isEnabled()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_IS_ENABLED);
    }
}