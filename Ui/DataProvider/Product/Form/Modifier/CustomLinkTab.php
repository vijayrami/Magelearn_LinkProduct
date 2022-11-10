<?php

namespace Magelearn\LinkProduct\Ui\DataProvider\Product\Form\Modifier;

use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\Related;
use Magento\Ui\Component\Form\Fieldset;

class CustomLinkTab extends Related
{
    const DATA_SCOPE_CUSTOM = 'customlink';
    /**
     * @var string
     */
    private static $previousGroup = 'search-engine-optimization';
    /**
     * @var int
     */
    private static $sortOrder = 90;
    /**
     * {@inheritdoc}
     */
    public function modifyMeta(array $meta)
    {
        $meta = array_replace_recursive(
            $meta,
            [
                static::GROUP_RELATED => [
                    'children' => [
                        $this->scopePrefix . static::DATA_SCOPE_CUSTOM => $this->getCustomFieldset()
                    ],
                    'arguments' => [
                        'data' => [
                            'config' => [
                                'label' => __('Related Products, Up-Sells, Cross-Sells and Buy together Products'),
                                'collapsible' => true,
                                'componentType' => Fieldset::NAME,
                                'dataScope' => static::DATA_SCOPE,
                                'sortOrder' => $this->getNextGroupSortOrder(
                                    $meta,
                                    self::$previousGroup,
                                    self::$sortOrder
                                ),
                            ],
                        ],
                    ],
                ],
            ]
        );
        return $meta;
    }
    /**
     * Prepares config for the Custom type products fieldset
     *
     * @return array
     */
    protected function getCustomFieldset()
    {
        $content = __(
            'Buy Together products are shown to customers in addition to the item the customer is looking at.'
        );
        return [
            'children' => [
                'button_set' => $this->getButtonSet(
                    $content,
                    __('Add Buy Together Products'),
                    $this->scopePrefix . static::DATA_SCOPE_CUSTOM
                ),
                'modal' => $this->getGenericModal(
                    __('Add Buy Together Products'),
                    $this->scopePrefix . static::DATA_SCOPE_CUSTOM
                ),
                static::DATA_SCOPE_CUSTOM => $this->getGrid($this->scopePrefix . static::DATA_SCOPE_CUSTOM),
            ],
            'arguments' => [
                'data' => [
                    'config' => [
                        'additionalClasses' => 'admin__fieldset-section',
                        'label' => __('Add Buy Together Products'),
                        'collapsible' => false,
                        'componentType' => Fieldset::NAME,
                        'dataScope' => '',
                        'sortOrder' => 90,
                    ],
                ],
            ]
        ];
    }
    /**
     * Retrieve all data scopes
     *
     * @return array
     */
    protected function getDataScopes()
    {
        return [
            static::DATA_SCOPE_CUSTOM
        ];
    }
}
