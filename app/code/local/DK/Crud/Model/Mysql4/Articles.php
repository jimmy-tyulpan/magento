<?php
class DK_Crud_Model_Mysql4_Articles extends  Mage_Core_Model_Mysql4_Abstract {

    public function _construct()
    {
        $this->_init('dk_crud/articles', 'article_id');
    }
}