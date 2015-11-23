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

namespace WellCommerce\AppBundle\Manager;

/**
 * Interface ManagerInterface
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface ManagerInterface
{
    /**
     * @return \WellCommerce\AppBundle\Helper\Flash\FlashHelperInterface
     */
    public function getValidatorHelper();

    /**
     * Returns the FlashHelper
     *
     * @return \WellCommerce\AppBundle\Helper\Flash\FlashHelperInterface
     */
    public function getFlashHelper();

    /**
     * Returns the ImageHelper
     *
     * @return \WellCommerce\AppBundle\Helper\Image\ImageHelperInterface
     */
    public function getImageHelper();

    /**
     * Returns the DoctrineHelper
     *
     * @return \WellCommerce\AppBundle\Helper\Doctrine\DoctrineHelperInterface
     */
    public function getDoctrineHelper();

    /**
     * Returns the RequestHelper
     *
     * @return \WellCommerce\AppBundle\Helper\Request\RequestHelperInterface
     */
    public function getRequestHelper();

    /**
     * Returns the Translator
     *
     * @return \WellCommerce\AppBundle\Helper\Translator\TranslatorHelperInterface
     */
    public function getTranslatorHelper();

    /**
     * @return \WellCommerce\AppBundle\Repository\RepositoryInterface
     */
    public function getRepository();

    /**
     * @return \WellCommerce\AppBundle\EventDispatcher\EventDispatcherInterface
     */
    public function getEventDispatcher();

    /**
     * @return \WellCommerce\AppBundle\Factory\FactoryInterface
     */
    public function getFactory();

    /**
     * Returns form object
     *
     * @return \WellCommerce\Component\Form\FormBuilderInterface
     */
    public function getFormBuilder();

    /**
     * Returns form instance from builder
     *
     * @param null|object $resource
     * @param array       $config
     *
     * @return \WellCommerce\Component\Form\Elements\FormInterface
     */
    public function getForm($resource, array $config = []);

    /**
     * Initializes new resource object
     *
     * @return object
     */
    public function initResource();

    /**
     * Persists new resource
     *
     * @param object $resource
     */
    public function createResource($resource);

    /**
     * Updates existing resource
     *
     * @param object $resource
     */
    public function updateResource($resource);

    /**
     * Removes a resource
     *
     * @param object $resource
     */
    public function removeResource($resource);

    /**
     * @return \WellCommerce\AppBundle\Context\ShopContextInterface
     */
    public function getShopContext();

    /**
     * @return null|object
     */
    public function getUser();
}