<?php 
	namespace WilliamsCommerce\OrderBy\Controller\Adminhtml\Order;

	use Magento\Framework\Controller\ResultFactory;

	class AddRow extends \Magento\Backend\App\Action{
		private $coreRegistry;
		private $orderByFactory;
		public function __construct(
			\Magento\Backend\App\Action\Context $context,
			\Magento\Framework\Registry $coreRegistry,
			\WilliamsCommerce\OrderBy\Model\OrderbyListFactory $orderByFactory
		){
			parent::__construct($context);
			$this->coreRegistry = $coreRegistry;
			$this->orderByFactory = $orderByFactory;
		}

		public function execute(){
			//die('test');
			$rowId = (int) $this->getRequest()->getParam('id');
			$rowData = $this->orderByFactory->create();
			if($rowId){
				$rowData = $rowData->load($rowId);
				
				$rowName = $rowData->getName();
				if(!$rowData->getId()){
					$this->messageManager->addError(__('row data no longer exist.'));
					$this->_redirect('orderby/order/index');
					return;
				}		
			}
			$this->coreRegistry->register('row_data',$rowData);
			$resultPage =  $this->resultFactory->create(ResultFactory::TYPE_PAGE);
			$name = $rowId ? __('Edit Row Data').' '.$rowName : __('Add Row Data');
			$resultPage->getConfig()->getTitle()->prepend($name);
			return $resultPage;
		}

		protected function _isAllowed(){
			return $this->_authorization->isAllowed('WilliamsCommerce_OrderBy::add_row');
		}
	}
?>