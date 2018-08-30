<?php


/**
* A Magento 2 module named Ewall/HelpDesk
* Copyright (C) 2017  Ewall Solutions Pvt Ltd
*
*/
namespace WilliamsCommerce\OrderBy\Model\OrderbyList\Source;

class Status implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * @var \Magento\Framework\Api\SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @var \Magento\Framework\Convert\DataObject
     */
    private $objectConverter;

    /**
     * @param \Ewall\HelpDesk\Api\DepartmentRepositoryInterface $departmentRepositoryInterface
     * @param \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
     * @param \Magento\Framework\Convert\DataObject $objectConverter
     * @param \Ewall\HelpDesk\Model\ResourceModel\Department\CollectionFactory $collectionFactory
     */
    public function __construct(
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\Convert\DataObject $objectConverter
   ) {
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->objectConverter = $objectConverter;

   }
   public function toOptionArray($addEmpty = true)
   {
      $options = [];
      if ($addEmpty) {
         //$options[] = ['label' => __('-- Please Select a Category --'), 'value' => ''];
         $options[] = ['label' => 'Active', 'value' => '1'];
         $options[] = ['label' => 'Inactive', 'value' => '0'];
      }
      return $options;
   }
 }