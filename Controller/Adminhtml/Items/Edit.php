<?php
namespace Addweb\News\Controller\Adminhtml\Items;

class Edit extends \Addweb\News\Controller\Adminhtml\Items
{
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        
        $model = $this->_objectManager->create('Addweb\News\Model\News');

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This news no longer exists.'));
                $this->_redirect('addweb_news/*');
                return;
            }
        }
        
        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getPageData(true);
        if (!empty($data)) {
            $model->addData($data);
        }
        
        $this->_coreRegistry->register('current_addweb_news_items', $model);
        $this->_initAction();
        $this->_view->getLayout()->getBlock('items_items_edit');
        $this->_view->renderLayout();
    }
}
