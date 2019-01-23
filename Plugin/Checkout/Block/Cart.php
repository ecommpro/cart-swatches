<?php
namespace EcommPro\AjaxCartSwatches\Plugin\Checkout\Block;

class Cart
{
    public function __construct(
        \EcommPro\AjaxCartSwatches\Model\Config $config
    )
    {
        $this->config = $config;
    }

    public function beforeGetItemRenderer(\Magento\Checkout\Block\Cart $subject, string $type)
    {
        if ($this->config->isEnabled()) {
            if ($type === 'configurable') {
                return ['configurable.swatches'];
            }
        }
    }
}