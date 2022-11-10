<?php

namespace Magelearn\LinkProduct\Model\Product;

class Link extends \Magento\Catalog\Model\Product\Link
{
    const LINK_TYPE_CUSTOMLINK = 7;
    
    /**
     * @return $this
     */
    public function useCustomLinks()
    {
        $this->setLinkTypeId(self::LINK_TYPE_CUSTOMLINK);
        return $this;
    }
}
