<?php

namespace Magelearn\LinkProduct\Plugin\Model\Import\Product\Type;

use Magento\CatalogImportExport\Model\Import\Product\Type\AbstractType;

class AbstractTypePlugin
{
    /**
     * @param AbstractType $subject
     * @param string[]     $result
     * @return string[]
     */
    public function afterGetCustomFieldsMapping(AbstractType $subject, array $result): array
    {
        $result['_customlink_sku'] = 'customlink_skus';

        return $result;
    }
}