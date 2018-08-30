<?php
 
namespace WilliamsCommerce\OrderBy\Helper;
 
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
        var $orderByFactory;

        public function __construct(
            \Magento\Backend\Helper\Data $HelperBackend,
            \WilliamsCommerce\OrderBy\Model\OrderbyListFactory $orderByFactory
        ){
            $this->HelperBackend = $HelperBackend;
            $this->orderByFactory = $orderByFactory;
            
        }
    /**
     * Return if display list is enabled on department view
     * @return bool
     */
    public function getOrderByLabelById($orderById) {
        $name = "";
        $data = $this->orderByFactory->create();
        $collection = $data->getCollection()->addFieldToFilter('status',1)->addFieldToFilter('id',$orderById)->getFirstItem()->getName();
        return $collection;
    }

    public function getBaseUrlAdmin() {
        $adminUrl = $this->HelperBackend->getAreaFrontName();
        return $adminUrl;
    }
}