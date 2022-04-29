<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ExampleProductSalePage\Business;

use Spryker\Zed\Product\Business\ProductFacade as SprykerProductFacade;

/**
 * @method \Pyz\Zed\ExampleProductSalePage\Business\ExampleProductSalePageBusinessFactory getFactory()
 */
class ExampleProductSalePageFacade extends SprykerProductFacade implements ExampleProductSalePageFacadeInterface
{
    /**
     * @return \Generated\Shared\Transfer\ProductLabelProductAbstractRelationsTransfer[]
     */
    public function findPyzProductLabelProductAbstractRelationChanges()
    {
        return $this->getFactory()
            ->createPyzProductAbstractRelationReader()
            ->findProductLabelProductAbstractRelationChanges();
    }
}
