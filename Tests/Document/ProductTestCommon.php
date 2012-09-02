<?php
/**
 * (c) 2012 Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Vespolina\ProductBundle\Tests\Document;

use Vespolina\ProductBundle\Document\ProductManager;

use Doctrine\Bundle\MongoDBBundle\Tests\TestCase;

/**
 * @author Richard D Shank <develop@zestic.com>
 */
abstract class ProductTestCommon extends TestCase
{
    protected $productMgr;

    public function setup()
    {
        $this->dm = self::createTestDocumentManager();
        $this->productMgr = new ProductManager(
            $this->dm,
            '\Vespolina\ProductBundle\Tests\Fixtures\Document\Product',
            array(),
            '\Vespolina\ProductBundle\Document\ProductIdentifierSet'
        );
    }

    public function tearDown()
    {
        $collections = $this->dm->getDocumentCollections();
        foreach ($collections as $collection) {
            $collection->drop();
        }
    }

    protected function persistNewProduct($name)
    {
        $product = $this->productMgr->createProduct();
        $product->setName($name);
        $this->productMgr->updateProduct($product);

        return $product;
    }
}
