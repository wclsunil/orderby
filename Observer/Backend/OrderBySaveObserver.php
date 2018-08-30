<?php
/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace WilliamsCommerce\OrderBy\Observer\Backend;

use Magento\Framework\Event\ObserverInterface;

class OrderBySaveObserver implements ObserverInterface
{
    protected $_request;

    
    public function __construct(\Magento\Framework\App\RequestInterface $request)
    {
        $this->_request = $request;
    }

    /**
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        
        $order = $observer->getEvent()->getOrder();
        $Oby = $this->_request->getPost('order_by');
        $order->setOrderBy($Oby);
        
        /*try{
            $order->save();    
        }catch(Exception $e){
            print_r($e->getMessage());
        }*/
               
    }
}
