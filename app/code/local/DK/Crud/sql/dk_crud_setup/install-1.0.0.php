<?php
/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = $this;
$installer->startSetup();

    try {
        $table = $installer->getConnection()
            ->newTable($installer->getTable('dk_crud/articles'))
            ->addColumn('article_id', Varien_Db_Ddl_Table::TYPE_INTEGER,null,[
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true
            ])
            ->addColumn('title', Varien_Db_Ddl_Table::TYPE_VARCHAR,null,['nullable' => false])
            ->addColumn('description', Varien_Db_Ddl_Table::TYPE_TEXT,null,['nullable' => false])
            ->addColumn('status', Varien_Db_Ddl_Table::TYPE_TINYINT,null,[
                'nullable' => false,
                'unsigned' => true
            ]);
        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    } catch (\Zend_Db_Exception $e) {
        var_dump($e->getMessage());
        die;
    }