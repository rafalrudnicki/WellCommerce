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
namespace WellCommerce\Bundle\OrderBundle\DataGrid;

use WellCommerce\Bundle\CoreBundle\DataGrid\AbstractDataGrid;
use WellCommerce\Component\DataGrid\Column\Column;
use WellCommerce\Component\DataGrid\Column\ColumnCollection;
use WellCommerce\Component\DataGrid\Column\Options\Appearance;
use WellCommerce\Component\DataGrid\Column\Options\Filter;
use WellCommerce\Component\DataGrid\Column\Options\Sorting;
use WellCommerce\Component\DataGrid\Configuration\EventHandler\ProcessEventHandler;
use WellCommerce\Component\DataGrid\Options\OptionsInterface;

/**
 * Class OrderDataGrid
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class OrderDataGrid extends AbstractDataGrid
{
    public function configureColumns(ColumnCollection $collection)
    {
        $collection->add(new Column([
            'id'         => 'id',
            'caption'    => $this->trans('order.label.id'),
            'appearance' => new Appearance([
                'width'   => 40,
                'visible' => false,
                'align'   => Appearance::ALIGN_CENTER,
            ]),
            'filter'     => new Filter([
                'type' => Filter::FILTER_BETWEEN,
            ]),
        ]));
    
        $collection->add(new Column([
            'id'         => 'number',
            'caption'    => $this->trans('order.label.number'),
            'filter'     => new Filter([
                'type' => Filter::FILTER_INPUT,
            ]),
            'sorting'    => new Sorting([
                'default_order' => Sorting::SORT_DIR_DESC,
            ]),
            'appearance' => new Appearance([
                'width' => 40,
                'align' => Appearance::ALIGN_CENTER,
            ]),
        ]));
        
        $collection->add(new Column([
            'id'         => 'client',
            'caption'    => $this->trans('order.label.client'),
            'filter'     => new Filter([
                'type' => Filter::FILTER_INPUT,
            ]),
            'appearance' => new Appearance([
                'width' => 140,
                'align' => Appearance::ALIGN_LEFT,
            ]),
        ]));
    
        $collection->add(new Column([
            'id'         => 'products',
            'caption'    => $this->trans('order.label.products'),
            'filter'     => new Filter([
                'type' => Filter::FILTER_INPUT,
            ]),
            'appearance' => new Appearance([
                'width' => 140,
                'align' => Appearance::ALIGN_LEFT,
            ]),
        ]));
        
        $collection->add(new Column([
            'id'         => 'productTotal',
            'caption'    => $this->trans('order.label.product_total.gross_price'),
            'filter'     => new Filter([
                'type' => Filter::FILTER_BETWEEN,
            ]),
            'appearance' => new Appearance([
                'width' => 40,
                'align' => Appearance::ALIGN_CENTER,
            ]),
        ]));
        
        $collection->add(new Column([
            'id'         => 'orderTotal',
            'caption'    => $this->trans('order.label.order_total'),
            'filter'     => new Filter([
                'type' => Filter::FILTER_BETWEEN,
            ]),
            'appearance' => new Appearance([
                'width' => 40,
                'align' => Appearance::ALIGN_CENTER,
            ]),
        ]));
        
        $collection->add(new Column([
            'id'         => 'currency',
            'caption'    => $this->trans('order.label.currency'),
            'filter'     => new Filter([
                'type' => Filter::FILTER_BETWEEN,
            ]),
            'appearance' => new Appearance([
                'width'   => 40,
                'visible' => false,
                'align'   => Appearance::ALIGN_CENTER,
            ]),
        ]));
        
        $collection->add(new Column([
            'id'         => 'currentStatusName',
            'caption'    => $this->trans('order.label.current_status'),
            'filter'     => new Filter([
                'type' => Filter::FILTER_INPUT,
            ]),
            'appearance' => new Appearance([
                'width' => 40,
                'align' => Appearance::ALIGN_CENTER,
            ]),
        ]));
    
        $collection->add(new Column([
            'id'         => 'paymentMethodName',
            'caption'    => $this->trans('order.label.payment_method'),
            'filter'     => new Filter([
                'type' => Filter::FILTER_INPUT,
            ]),
            'appearance' => new Appearance([
                'width' => 80,
                'align' => Appearance::ALIGN_CENTER,
            ]),
        ]));
    
        $collection->add(new Column([
            'id'         => 'shippingMethodName',
            'caption'    => $this->trans('order.label.shipping_method'),
            'filter'     => new Filter([
                'type' => Filter::FILTER_INPUT,
            ]),
            'appearance' => new Appearance([
                'width' => 80,
                'align' => Appearance::ALIGN_CENTER,
            ]),
        ]));
        
        $collection->add(new Column([
            'id'         => 'createdAt',
            'caption'    => $this->trans('order.label.created_at'),
            'filter'     => new Filter([
                'type' => Filter::FILTER_BETWEEN,
            ]),
            'appearance' => new Appearance([
                'width' => 40,
                'align' => Appearance::ALIGN_CENTER,
            ]),
        ]));
    }
    
    protected function configureOptions(OptionsInterface $options)
    {
        parent::configureOptions($options);
    
        $options->getMechanics()->set('default_sorting', 'createdAt');
        
        $eventHandlers = $options->getEventHandlers();
        
        $eventHandlers->add(new ProcessEventHandler([
            'function' => $this->getJavascriptFunctionName('process'),
        ]));
    }
}
