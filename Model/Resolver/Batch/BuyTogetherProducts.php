<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magelearn\LinkProduct\Model\Resolver\Batch;

use Magelearn\LinkProduct\Model\Product\Link;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\Resolver\BatchResponse;
use Magento\Framework\GraphQl\Query\Resolver\ContextInterface;
use Magento\RelatedProductGraphQl\Model\Resolver\Batch\AbstractLikedProducts;

/**
 * Buy Together Products Resolver
 */
class BuyTogetherProducts extends AbstractLikedProducts
{
    /**
     * @inheritDoc
     */
    protected function getNode(): string
    {
        return 'custom_link_products';
    }

    /**
     * @inheritDoc
     */
    protected function getLinkType(): int
    {
        return Link::LINK_TYPE_CUSTOMLINK;
    }
}
