<?php

namespace Magelearn\LinkProduct\Model;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\ResourceModel\Product\Link\Collection;
use Magento\Framework\DataObject;
use Magelearn\LinkProduct\Model\Product\Link;

class CustomLinkProduct extends DataObject
{
    /**
     * Product link instance
     *
     * @var Product\Link
     */
    protected $linkInstance;
    
    /**
     * CustomLinkProduct constructor.
     * @param Link $productLink
     */
    public function __construct(
        Link $productLink
        ) {
            $this->linkInstance = $productLink;
    }
    
    /**
     * Retrieve link instance
     *
     * @return  Product\Link
     */
    public function getLinkInstance()
    {
        return $this->linkInstance;
    }

    /**
     * Retrieve array of customlink products
     *
     * @param Product $currentProduct
     * @return array
     */
    public function getCustomLinkProducts(Product $currentProduct)
    {
        if (!$this->hasCustomLinkProducts()) {
            $products = [];
            $collection = $this->getCustomLinkProductCollection($currentProduct);
            foreach ($collection as $product) {
                $products[] = $product;
            }
            $this->setCustomLinkProducts($products);
        }
        return $this->getData('custom_link_products');
    }

    /**
     * Retrieve customlink products identifiers
     *
     * @param Product $currentProduct
     * @return array
     */
    public function getCustomLinkProductIds(Product $currentProduct)
    {
        if (!$this->hasCustomLinkProductIds()) {
            $ids = [];
            foreach ($this->getCustomLinkProducts($currentProduct) as $product) {
                $ids[] = $product->getId();
            }
            $this->setCustomLinkProductIds($ids);
        }
        return $this->getData('custom_link_product_ids');
    }

    /**
     * Retrieve collection customlink product
     *
     * @param Product $currentProduct
     * @return \Magento\Catalog\Model\ResourceModel\Product\Link\Product\Collection
     */
    public function getCustomLinkProductCollection(Product $currentProduct)
    {
        $collection = $this->getLinkInstance()->useCustomLinks()->getProductCollection()->setIsStrongMode();
        $collection->setProduct($currentProduct);
        return $collection;
    }
}
