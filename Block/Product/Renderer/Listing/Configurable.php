<?php
namespace EcommPro\AjaxCartSwatches\Block\Product\Renderer\Listing;

class Configurable extends \Magento\Swatches\Block\Product\Renderer\Listing\Configurable
{
    const MEDIA_CALLBACK_ACTION = 'ajaxcartswatches/ajax/media';

    protected function getCacheLifetime()
    {
        return null;
    }

    public function getMediaCallback()
    {
        return $this->getUrl(self::MEDIA_CALLBACK_ACTION, ['_secure' => $this->getRequest()->isSecure()]);
    }
}