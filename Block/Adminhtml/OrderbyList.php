<?php 
	namespace WilliamsCommerce\OrderBy\Block\Adminhtml;

	class OrderbyList extends \Magento\Backend\Block\Template{

		protected $_coreRegistry  = null;
		var $orderByFactory;

		public function __construct(
			\Magento\Backend\Block\Widget\Context $context,
			\WilliamsCommerce\OrderBy\Model\OrderbyListFactory $orderByFactory
		){
			$this->orderByFactory = $orderByFactory;
			parent::__construct($context);
			
		}

		public function getOrderByCollection(){
			$data = $this->orderByFactory->create();
			$collection = $data->getCollection()->addFieldToFilter('status',1);
			return $collection;
		}
	}
?>