<?php
/**
 * (c) 2012 Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Vespolina\ProductBundle\Tests\Model;

use Vespolina\ProductBundle\Handler\ProductHandlerInterface;
use Vespolina\ProductBundle\Tests\ProductTestCommon;

class ProductHandlerTest extends ProductTestCommon
{
    protected $handler;

    protected function setUp()
    {
        // don't use the common handler, so the product creation and related functionality can be tested
        $this->handler = $this->getMock(
            'Vespolina\ProductBundle\Handler\ProductHandler',
            null,
            array('Vespolina\ProductBundle\Tests\Fixtures\Model\Product')
        );
    }

    public function testCreateProduct()
    {
        $this->assertInstanceOf('Vespolina\Entity\ProductInterface', $this->handler->createProduct());
    }
}
