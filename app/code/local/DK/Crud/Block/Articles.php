<?php
class DK_Crud_Block_Articles extends Mage_Core_Block_Template
{
    public function getArticles(){
        return Mage::getModel('dk_crud/articles')->getCollection()
            ->addFilter('status','1');
    }
}