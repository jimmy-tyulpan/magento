<?php

class DK_Crud_Adminhtml_ArticlesController extends Mage_Adminhtml_Controller_Action
{

    public function  indexAction() {
        $this->_initAction()->renderLayout();
    }

    protected function _initAction() {
        $this->loadLayout()
            ->_setActiveMenu('crud')
            ->_title($this->__('Crud'))
            ->_addBreadcrumb($this->__('Crud'), $this->__('Crud'));
        return $this;
    }

    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('crud/dk_crud_articles');
    }

    public function editAction(){
        $this->_initAction();
        try {
            if ($this->getRequest()->isGet()) {
                $id = $this->getRequest()->get('id');
                if (isset($id) && !empty($id) && is_integer(intval($id))) {
                    $model = Mage::getModel('dk_crud/articles');
                    if (isset($model) && !empty($model) && $model instanceof DK_Crud_Model_Articles) {
                        $dataModel = $model->load($id);
                        if (!$dataModel->getId()) {
                            Mage::getSingleton('adminhtml/session')->addError($this->__('This article no longer exists'));
                            $this->_redirect('*/*/');
                            return false;
                        } else {
                            Mage::register('dk_crud',$dataModel);
                        }
                    }
                } else {
                    Mage::register('dk_crud',new DK_Crud_Model_Articles());
                }
                $this->_initAction()
                    ->_addBreadcrumb($id ? $this->__('Edit Article') : $this->__('New Article'), $id ? $this->__('Edit Article') : $this->__('New Article'))
                    ->_addContent($this->getLayout()->createBlock('dk_crud/adminhtml_articles_edit')->setData('action', $this->getUrl('*/*/save')))
                    ->renderLayout();
            }
        } catch (\Exception $e) {
            var_dump($e->getMessage(),$e->getFile(),$e->getLine());
        }
        return false;
    }

    public function saveAction(){
        $this->_initAction();
        if ($this->getRequest()->isPost() && $postData = $this->getRequest()->getPost()) {
            if (!isset($postData['status'])) {
                $postData['status'] = 0;
            }
            $model = Mage::getSingleton('dk_crud/articles');
            $model->setData($postData);
            try {
                $model->save();

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('The article has been saved.'));
                $this->_redirect('*/*/');

                return;
            }
            catch (Mage_Core_Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
            catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('An error occurred while saving this article.'));
            }
            $this->_redirectReferer();
        }
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function deleteAction() {
        $this->_initAction();
        if ($this->getRequest()->isGet()) {
            $id = $this->getRequest()->get('id');
            if (isset($id) && !empty($id) && is_integer(intval($id))) {
                try {
                    $model = Mage::getModel('dk_crud/articles');
                    $model = $model->load($id);
                    $model->delete();
                    Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Article was deleted successfully!'));
                } catch (Mage_Core_Exception $e) {
                    Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                }
                catch (Exception $e) {
                    Mage::getSingleton('adminhtml/session')->addError($this->__('An error occurred while deleting this article.'));
                }
                $this->_redirect('*/*/');
            }
        }
    }
}