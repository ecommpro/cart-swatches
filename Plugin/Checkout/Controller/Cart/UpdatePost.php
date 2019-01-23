<?php
namespace EcommPro\AjaxCartSwatches\Plugin\Checkout\Controller\Cart;

use Magento\Checkout\Model\Cart as CustomerCart;

class UpdatePost
{
    protected $cart;

    public function __construct(
        CustomerCart $cart
    )
    {
        $this->cart = $cart;
    }

    public function beforeExecute(\Magento\Checkout\Controller\Cart\UpdatePost $subject)
    {
        $cartData = (array)$subject->getRequest()->getParam('cart');

        foreach($cartData as $itemId => $itemData) {
            if (!isset($itemData['super_attribute'])) {
                continue;
            }
            $quoteItem = $this->cart->getQuote()->getItemById($itemId);
            $itemData['id'] = $itemId;
            $itemData['product'] = $quoteItem->getProductId();            
            $item = $this->cart->updateItem($itemId, new \Magento\Framework\DataObject($itemData));
        }
        $this->cart->save();
    }
}