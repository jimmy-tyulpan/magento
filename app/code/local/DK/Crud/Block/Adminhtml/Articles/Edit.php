<?php

class DK_Crud_Block_Adminhtml_Articles_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    public function __construct()
    {
        $this->_blockGroup = 'dk_crud';
        $this->_controller = 'adminhtml_articles';
        parent::__construct();
        $this->_updateButton('save', 'label', $this->__('Save article'));
        $this->_updateButton('delete', 'label', $this->__('Delete article'));
    }

    public function getHeaderText()
    {
        if (Mage::registry('dk_crud')->getId()) {
            return $this->__('Edit article');
        } else {
            return $this->__('New article');
        }
    }
}