<?php

namespace Magelearn\LinkProduct\Model\ProductLink\CollectionProvider;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\ProductLink\CollectionProviderInterface;

class CustomLinkProducts implements CollectionProviderInterface
{
    /** @var \Magelearn\LinkProduct\Model\CustomLinkProduct */
    protected $customLinkModel;

    /**
     * Custom Link constructor.
     * @param \Magelearn\LinkProduct\Model\CustomLinkProduct $customLinkModel
     */
    public function __construct(
        \Magelearn\LinkProduct\Model\CustomLinkProduct $customLinkModel
    ) {
        $this->customLinkModel = $customLinkModel;
    }

    /**
     * {@inheritdoc}
     */
    public function getLinkedProducts(Product $product)
    {
        return (array) $this->customLinkModel->getCustomLinkProducts($product);
    }
}
