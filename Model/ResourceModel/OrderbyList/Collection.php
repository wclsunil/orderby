<?php 
	namespace WilliamsCommerce\OrderBy\Model\ResourceModel\OrderbyList;
	class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{
		protected $_idFieldName = 'id';
		protected $_eventPrefix = 'williamscommerce_orderby_orderbylist_collection';
		protected $_eventObject = 'orderbylist_collection';

		/*Define resouce model*/

		protected function _construct(){
			$this->_init('WilliamsCommerce\OrderBy\Model\OrderbyList','WilliamsCommerce\OrderBy\Model\ResourceModel\OrderbyList');
		}
	}

?>