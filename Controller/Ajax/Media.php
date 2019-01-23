<?php
namespace EcommPro\AjaxCartSwatches\Controller\Ajax;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

/**
 * Class Media
 */
class Media extends \Magento\Swatches\Controller\Ajax\Media
{
    public function __construct(
        Context $context,
        \Magento\Catalog\Model\ProductFactory $productModelFactory,        
        \EcommPro\AjaxCartSwatches\Helper\Data $swatchHelper
    ) {
        parent::__construct($context, $productModelFactory, $swatchHelper);
    }
}
