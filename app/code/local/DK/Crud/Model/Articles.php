<?php

class DK_Crud_Model_Articles extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        $this->_init('dk_crud/articles');
    }
}