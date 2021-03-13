<?php
namespace Addweb\News\Block;

use Magento\Framework\View\Element\Template\Context;
use Addweb\News\Model\NewsFactory;
use Magento\Cms\Model\Template\FilterProvider;
/**
 * News View block
 */
class NewsView extends \Magento\Framework\View\Element\Template
{
    /**
     * @var News
     */
    protected $_news;
    
    public function __construct(
        Context $context,
        NewsFactory $news,
        FilterProvider $filterProvider
    ) {
        $this->_news = $news;
        $this->_filterProvider = $filterProvider;
        parent::__construct($context);
    }

    public function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__('Addweb News Module View Page'));
        
        return parent::_prepareLayout();
    }

    public function getSingleData()
    {
        $id = $this->getRequest()->getParam('news_id');
        $news = $this->_news->create();
        $singleData = $news->load($id);
        if($singleData->getNewsId() || $singleData['news_id'] && $singleData->getStatus() == 1){
            return $singleData;
        }else{
            return false;
        }
    }
}