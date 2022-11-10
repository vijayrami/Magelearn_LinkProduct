# Magelearn_LinkProduct
Custom Link product relation for magento 2 supported by GraphQl

You can retrieve this custom type products data same as related products, up-sell products and cross-sell products data like below:
Just add `custom_link_products` in GraphQl Request.

```
{
  products(filter: { sku: { eq: "24-WB06" } }) {
    items {
      uid
      name
      related_products {
        uid
        name
      }
      upsell_products {
        uid
        name
      }
      crosssell_products {
        uid
        name
      }
      ```custom_link_products {
        uid
        name
      }```
    }
  }
}
```
