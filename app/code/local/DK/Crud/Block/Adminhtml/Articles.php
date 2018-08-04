<?php

class DK_Crud_Block_Adminhtml_Articles extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    public function __construct()
    {
        $this->_blockGroup = 'crud';
        $this->_controller = 'adminhtml_articles';
        $this->_headerText = $this->__('Articles');

        parent::_construct();
    }
}