<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 * 
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 * 
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\ShippingBundle\Entity;

use Doctrine\Common\Collections\Collection;
use WellCommerce\Bundle\AppBundle\Entity\HierarchyAwareInterface;
use WellCommerce\Bundle\CoreBundle\Behaviours\Enableable\EnableableInterface;
use WellCommerce\Bundle\CoreBundle\Entity\BlameableInterface;
use WellCommerce\Bundle\CoreBundle\Entity\EntityInterface;
use WellCommerce\Bundle\CoreBundle\Entity\TimestampableInterface;
use WellCommerce\Bundle\CoreBundle\Entity\TranslatableInterface;
use WellCommerce\Bundle\CurrencyBundle\Entity\CurrencyInterface;
use WellCommerce\Bundle\TaxBundle\Entity\TaxAwareInterface;

/**
 * Interface ShippingMethodInterface
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface ShippingMethodInterface extends
    EntityInterface,
    EnableableInterface,
    TimestampableInterface,
    TranslatableInterface,
    BlameableInterface,
    TaxAwareInterface,
    HierarchyAwareInterface
{
    /**
     * @return string
     */
    public function getCalculator() : string;

    /**
     * @param $calculator
     */
    public function setCalculator(string $calculator);
    
    /**
     * @return string
     */
    public function getOptionsProvider() : string;
    
    /**
     * @param string $optionsProvider
     */
    public function setOptionsProvider(string $optionsProvider);
    
    /**
     * @return Collection
     */
    public function getCosts() : Collection;

    /**
     * @param Collection $costs
     */
    public function setCosts(Collection $costs);

    /**
     * @return CurrencyInterface|null
     */
    public function getCurrency();

    /**
     * @param CurrencyInterface|null $currency
     */
    public function setCurrency(CurrencyInterface $currency = null);

    /**
     * @return Collection
     */
    public function getPaymentMethods() : Collection;
    
    /**
     * {@inheritdoc}
     */
    public function getCountries(): array;
    
    /**
     * {@inheritdoc}
     */
    public function setCountries(array $countries);
}
