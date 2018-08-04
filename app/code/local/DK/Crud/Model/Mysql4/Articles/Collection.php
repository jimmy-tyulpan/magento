<?php

class DK_Crud_Model_Mysql4_Articles_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        $this->_init('dk_crud/articles');
    }
}