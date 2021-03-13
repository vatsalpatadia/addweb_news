<?php
namespace Addweb\News\Controller\Adminhtml\Items;

class Delete extends \Addweb\News\Controller\Adminhtml\Items
{

    public function execute()
    {
        $news_id = $this->getRequest()->getParam('news_id');
        if ($news_id) {
            try {
                $model = $this->_objectManager->create('Addweb\News\Model\News');
                $model->load($news_id);
                $model->delete();
                $this->messageManager->addSuccess(__('You deleted the news.'));
                $this->_redirect('addweb_news/*/');
                return;
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addError(
                    __('We can\'t delete news right now. Please review the log and try again.')
                );
                $this->_objectManager->get('Psr\Log\LoggerInterface')->critical($e);
                $this->_redirect('addweb_news/*/edit', ['id' => $this->getRequest()->getParam('news_id')]);
                return;
            }
        }
        $this->messageManager->addError(__('We can\'t find a news to delete.'));
        $this->_redirect('addweb_news/*/');
    }
}
