<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node;

use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\ProductVisitorInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\VisitableProductInterface;

class ProductOptionType implements VisitableProductInterface
{

    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $key;

    /**
     * @var \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValue[]
     */
    private $productOptionValues = [];

    /**
     * @var bool
     */
    private $isOptional;

    /**
     * @var int|null
     */
    private $sequence;

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\ProductVisitorInterface $visitor
     *
     * @return void
     */
    public function accept(ProductVisitorInterface $visitor)
    {
        $visitor->visitProductOptionType($this);

        $visitor->setContext($this);

        foreach ($this->productOptionValues as $option) {
            $option->accept($visitor);
        }

        $visitor->leaveContext();
    }

    /**
     * @param string $key
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValue[] $productOptionValues
     * @param bool $isOptional
     * @param int $sequence
     */
    public function __construct($key, array $productOptionValues, $isOptional = true, $sequence = null)
    {
        $this->key = $key;

        foreach ($productOptionValues as $item) {
            $this->addProductOptionValue($item);
        }

        $this->isOptional = $isOptional;
        $this->sequence = $sequence;
    }

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValue $value
     *
     * @return void
     */
    private function addProductOptionValue(ProductOptionValue $value)
    {
        $this->productOptionValues[] = $value;
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     *
     * @return void
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValue[]
     */
    public function getProductOptionValues()
    {
        return $this->productOptionValues;
    }

    /**
     * @return bool
     */
    public function isOptional()
    {
        return $this->isOptional;
    }

    /**
     * @return int|null
     */
    public function getSequence()
    {
        return $this->sequence;
    }

}
