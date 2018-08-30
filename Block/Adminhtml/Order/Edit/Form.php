<?php 
    namespace WilliamsCommerce\OrderBy\Block\Adminhtml\Order\Edit;

    class Form extends \Magento\Backend\Block\Widget\Form\Generic{
        /**
         * @var \Magento\Store\Model\System\Store
         */
        protected $_systemStore;

        /**
         * @param \Magento\Backend\Block\Template\Context $context
         * @param \Magento\Framework\Registry             $registry
         * @param \Magento\Framework\Data\FormFactory     $formFactory
         * @param array                                   $data
         */
        public function __construct(
            \Magento\Backend\Block\Template\Context $context,
            \Magento\Framework\Registry $registry,
            \Magento\Framework\Data\FormFactory $formFactory,
            \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
            \WilliamsCommerce\OrderBy\Helper\Data $helperData,
            array $data = []
        ){
            $this->_wysiwygConfig = $wysiwygConfig;
            $this->_helperData = $helperData;
            parent::__construct($context,$registry,$formFactory,$data);
        }

        /**
         * Prepare form.
         *
         * @return $this
         */
        protected function _prepareForm()
	    {
	        $dateFormat = $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT);
	        $model = $this->_coreRegistry->registry('row_data');
	        $baseUrl = $this->_storeManager->getStore()->getBaseUrl();
	        $adminkey = $this->_helperData->getBaseUrlAdmin();
	        $form = $this->_formFactory->create(
	            ['data' => [
	                            'id' => 'edit_form', 
	                            'enctype' => 'multipart/form-data', 
	                            'action' => $baseUrl.$adminkey.'/orderbylist/order/save', 
	                            'method' => 'post'
	                        ]
	            ]
	        );
	 
	        $form->setHtmlIdPrefix('orderby_');
	        if ($model->getId()) {
	            $fieldset = $form->addFieldset(
	                'base_fieldset',
	                ['legend' => __('Edit Row Data'), 'class' => 'fieldset-wide']
	            );
	            $fieldset->addField('id', 'hidden', ['name' => 'id']);
	        } else {
	            $fieldset = $form->addFieldset(
	                'base_fieldset',
	                ['legend' => __('Add Row Data'), 'class' => 'fieldset-wide']
	            );
	        }
	 
	        $fieldset->addField(
	            'name',
	            'text',
	            [
	                'name' => 'name',
	                'label' => __('Name'),
	                'id' => 'title',
	                'title' => __('Name'),
	                'class' => 'required-entry',
	                'required' => true,
	            ]
	        );
	        $fieldset->addField(
	            'status',
	            'select',
	            [
	                'name' => 'status',
	                'label' => __('Status'),
	                'id' => 'title',
	                'title' => __('Status'),
	                'class' => 'required-entry',
	                'required' => true,
	                'values' => array(
                        array('value'=>'1','label'=>'Active'),
                        array('value'=>'0','label'=>'Inactive'),
                   )
	            ]
	        );
	        $form->setValues($model->getData());
	        $form->setUseContainer(true);
	        $this->setForm($form);
	 
	        return parent::_prepareForm();
	    }
    }
?>