<?php 
	namespace WilliamsCommerce\OrderBy\Block\Adminhtml\Order;

	class AddRow extends \Magento\Backend\Block\Widget\Form\Container{

		protected $_coreRegistry  = null;

		public function __construct(
			\Magento\Backend\Block\Widget\Context $context,
			\Magento\Framework\Registry $registry,
			array $data = []
		){
			$this->_coreRegistry = $registry;
			parent::__construct($context);
		}

		protected function _construct(){
			$this->_objectId = 'row_id';
			$this->_blockGroup = 'WilliamsCommerce_OrderBy';
			$this->_controller = 'adminhtml_order';
			parent::_construct();
			if($this->_isAllowedAction('WilliamsCommerce_OrderBy::add_row')){
				$this->buttonList->update('save','label',__('Save'));
			}else{
				$this->buttonList->remove('save');
			}
			$this->buttonList->remove('reset');
		}

		public function getHeaderText(){
			return __('Add Row Data');
		}

		protected function _isAllowedAction($resourceId){
			return $this->_authorization->isAllowed($resourceId);
		}

		public function getFormActionUrl(){
			if($this->hasFormActionUrl()){
				return $this->getData('form_action_url');
			}
			return ('admin/orderby/orderby/save');
		}
	}	
?>