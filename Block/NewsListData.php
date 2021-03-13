<?php
namespace Addweb\News\Block;

use Magento\Framework\View\Element\Template\Context;
use Addweb\News\Model\NewsFactory;

class NewsListData extends \Magento\Framework\View\Element\Template
{
    protected $_news;
    
    public function __construct(
        Context $context,
        NewsFactory $news
    ) {
        $this->_news = $news;
        parent::__construct($context);
    }

    public function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__('Addweb News Module List Page'));
        
        if ($this->getNewsCollection()) {
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'addweb.news.pager'
            )->setAvailableLimit(array(5=>5,10=>10,15=>15))->setShowPerPage(true)->setCollection(
                $this->getNewsCollection()
            );
            $this->setChild('pager', $pager);
            $this->getNewsCollection()->load();
        }
        return parent::_prepareLayout();
    }

    public function getNewsCollection()
    {
        $page = ($this->getRequest()->getParam('p'))? $this->getRequest()->getParam('p') : 1;
        $pageSize = ($this->getRequest()->getParam('limit'))? $this->getRequest()->getParam('limit') : 5;

        $news = $this->_news->create();
        $collection = $news->getCollection();
        $collection->addFieldToFilter('status','1');
        $collection->setPageSize($pageSize);
        $collection->setCurPage($page);

        return $collection;
    }

    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
}