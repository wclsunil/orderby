<?php 
	namespace WilliamsCommerce\OrderBy\Controller\Adminhtml\Order;
	use Magento\Framework\App\Filesystem\DirectoryList;
	class Save extends \Magento\Backend\App\Action{

		var $orderByFactory;

		public function __construct(
			\Magento\Backend\App\Action\Context $context,
			\WilliamsCommerce\OrderBy\Model\OrderbyListFactory $orderByFactory
		){
			$this->orderByFactory = $orderByFactory;
			parent::__construct($context);
		}

		public function execute(){
			$data = $this->getRequest()->getPostValue();
			if(!$data){
				$this->_redirect('orderby/order/addrow');
				return;
			}
			try{
				$rowData  = $this->orderByFactory->create();
				$rowData->setData($data);
				if(isset($data['id'])){
					$rowData->setId($data['id']); 
				}
				$rowData->save();
				$this->messageManager->addSuccess(__('Order By Data has been successfully saved!'));
			}catch(\Exception $e){
				$this->messageManager->addError(__($e->getMessage()));
			}
			$this->_redirect('orderbylist/order/index');
		}

		protected function _isAllowed(){
			return $this->_authorization->isAllowed('WilliamsCommerce_OrderBy:save');
		}
	}
?>