<?php 
	namespace WilliamsCommerce\OrderBy\Setup;

	use Magento\Framework\Setup\UpgradeSchemaInterface;
	use Magento\Framework\Setup\ModuleContextInterface;
	use Magento\Framework\Setup\SchemaSetupInterface;

	class UpgradeSchema implements UpgradeSchemaInterface
	{

	    /**
	     * {@inheritdoc}
	     */
	    public function upgrade(
	        SchemaSetupInterface $setup,
	        ModuleContextInterface $context
	    ) {
	        $installer = $setup;

	        $installer->startSetup();
	        if (version_compare($context->getVersion(), "1.0.0", "<")) {
	        //Your upgrade script
	        }
	        if (version_compare($context->getVersion(), '1.0.1', '<')) {
	          if (!$installer->tableExists('orderby')) {
					$table = $installer->getConnection()->newTable(
						$installer->getTable('orderby')
					)
						->addColumn(
							'id',
							\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
							null,
							[
								'identity' => true,
								'nullable' => false,
								'primary'  => true,
								'unsigned' => true,
							],
							'ID'
						)
						->addColumn(
							'name',
							\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
							255,
							['nullable => false'],
							'Name'
						)
						->addColumn(
							'status',
							\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
							1,
							[],
							'Status'
						)
						->addColumn(
								'created_at',
								\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
								null,
								['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
								'Created At'
						)->addColumn(
							'updated_at',
							\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
							null,
							['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
							'Updated At')
						->setComment('Order By Table');
					$installer->getConnection()->createTable($table);

					$installer->getConnection()->addIndex(
						$installer->getTable('orderby'),
						$setup->getIdxName(
							$installer->getTable('orderby'),
							['name'],
							\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
						),
						['name'],
						\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
					);
				}
	        }
	        $installer->endSetup();
	    }
	}
?>