<?php
namespace EcommPro\AjaxCartSwatches\Helper;

use Magento\Catalog\Model\Product as ModelProduct;

class Data extends \Magento\Swatches\Helper\Data
{
    public function getProductMediaGallery(ModelProduct $product)
    {
        if (!in_array($product->getData('image'), [null, self::EMPTY_IMAGE_VALUE], true)) {
            $baseImage = $product->getData('image');
        } else {
            $productMediaAttributes = array_filter($product->getMediaAttributeValues(), function ($value) {
                return $value !== self::EMPTY_IMAGE_VALUE && $value !== null;
            });
            foreach ($productMediaAttributes as $attributeCode => $value) {
                if ($attributeCode !== 'swatch_image') {
                    $baseImage = (string)$value;
                    break;
                }
            }
        }

        if (empty($baseImage)) {
            return [];
        }

        $resultGallery = $this->_getAllSizeImages($product, $baseImage);
        $resultGallery['gallery'] = $this->_getGalleryImages($product);

        return $resultGallery;
    }

    protected function _getGalleryImages(ModelProduct $product)
    {
        //TODO: remove after fix MAGETWO-48040
        $product = $this->productRepository->getById($product->getId());

        $result = [];
        $mediaGallery = $product->getMediaGalleryImages();
        foreach ($mediaGallery as $media) {
            $result[$media->getData('value_id')] = $this->_getAllSizeImages(
                $product,
                $media->getData('file')
            );
        }
        return $result;
    }

    protected function _getAllSizeImages(ModelProduct $product, $imageFile)
    {
        return [
            'large' => $this->imageHelper->init($product, 'cart_page_product_thumbnail')
                ->setImageFile($imageFile)
                ->getUrl(),
            'medium' => $this->imageHelper->init($product, 'cart_page_product_thumbnail')
                ->setImageFile($imageFile)
                ->getUrl(),
            'small' => $this->imageHelper->init($product, 'cart_page_product_thumbnail')
                ->setImageFile($imageFile)
                ->getUrl(),
        ];
    }

}