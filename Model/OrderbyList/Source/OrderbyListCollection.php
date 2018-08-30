<?php


/**
* A Magento 2 module named Ewall/HelpDesk
* Copyright (C) 2017  Ewall Solutions Pvt Ltd
*
*/
namespace WilliamsCommerce\OrderBy\Model\OrderbyList\Source;

class OrderbyListCollection implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * @var \Magento\Framework\Api\SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @var \Magento\Framework\Convert\DataObject
     */
    private $objectConverter;
    var $orderByFactory;

    /**
     * @param \Ewall\HelpDesk\Api\DepartmentRepositoryInterface $departmentRepositoryInterface
     * @param \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
     * @param \Magento\Framework\Convert\DataObject $objectConverter
     * @param \Ewall\HelpDesk\Model\ResourceModel\Department\CollectionFactory $collectionFactory
     */
    public function __construct(
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\Convert\DataObject $objectConverter,
        \WilliamsCommerce\OrderBy\Model\OrderbyListFactory $orderByFactory
   ) {
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->orderByFactory = $orderByFactory;
        $this->objectConverter = $objectConverter;

   }
   public function toOptionArray($addEmpty = true)
   {
      $options[] = ['label' => __('Main Website'), 'value' => ''];
      $data = $this->orderByFactory->create();
      $collections = $data->getCollection()->addFieldToFilter('status',1);
      foreach ($collections as $key => $collection) {
        $options[] = ['label' => $collection->getName(), 'value' => $collection->getId()];
      }
      return $options;
   }
 }