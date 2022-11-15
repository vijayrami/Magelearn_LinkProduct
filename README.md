# Magelearn_LinkProduct
Custom Link product relation for magento 2 supported by GraphQl.

It Also supports to import `custom link products` via Magento's Import CSV.

[![image-1.png](https://i.postimg.cc/c13V3WmH/image-1.png)](https://postimg.cc/fkw2461n)

This extension includes all of the backend logic of relating the custom product type at backend. You will need to design the frontend component or use it with GraphQl for PWA to get these products information.

You can retrieve this custom type products data same as related products, up-sell products and cross-sell products data like below:

https://devdocs.magento.com/guides/v2.4/graphql/queries/products.html#retrieve-related-products-up-sells-and-cross-sells

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
      custom_link_products {
        uid
        name
      }
    }
  }
}
```
#### Usage

```
public function __construct(
    ...
    \Magelearn\LinkProduct\Model\CustomLinkProduct $customlinkproduct,
    ....
) {
    ...
    $this->customlinkproduct = $customlinkproduct;
}

$product = $currentProduct;
return products
$customLinkItems = $this->customlinkproduct->getCustomLinkProducts($product);
//return product ids
$customLinkItemIds = $this->customlinkproduct->getCustomLinkProductIds($product);
 ```
#### Step 1

Using Composer (recommended)

composer require magelearn/link-product

#### Manually

Download the extension
Unzip the file

Create a folder {Magento 2 root}/app/code/Magelearn/LinkProduct
Copy the content from the unzip folder
Step 2 - Enable extension ("cd" to {Magento root} folder)
```
  php bin/magento module:enable Magelearn_LinkProduct
  php bin/magento set:upg
  php bin/magento set:d:c
  php bin/magento set:s:d -f
  php bin/magento c:c
  php bin/magento c:f
```
