<?php 
	namespace WilliamsCommerce\OrderBy\Model;
	class OrderbyList extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface{
		
		const CACHE_TAG = 'orderbylist_order';

		protected $_cacheTag = 'orderbylist_order';

		protected $_eventPrefix = "orderbylist_order";

		protected function _construct(){
			$this->_init('WilliamsCommerce\OrderBy\Model\ResourceModel\OrderbyList');
		}

		public function getIdentities(){
			return [self::CACHE_TAG . '_' . $this->getId()];
		}

		public function getDefaultValues(){
			
			$values = [];

			return $values;
		}
	}
?>