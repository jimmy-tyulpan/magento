<?php
class DK_Crud_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction() {

        $this->loadLayout();
        $this->renderLayout();
//        Zend_Debug::dump($this->getLayout()->getUpdate()->getHandles());
    }
}