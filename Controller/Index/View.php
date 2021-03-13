<?php
namespace Addweb\News\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Exception\NotFoundException;
use Addweb\News\Block\NewsView;

class View extends \Magento\Framework\App\Action\Action
{
    protected $_newsview;

    public function __construct(
        Context $context,
        NewsView $newsview
    ) {
        $this->_newsview = $newsview;
        parent::__construct($context);
    }

    public function execute()
    {
    	if(!$this->_newsview->getSingleData()){
            throw new NotFoundException(__('Parameter is incorrect.'));
    	}
    	
        $this->_view->loadLayout();
        $this->_view->getLayout()->initMessages();
        $this->_view->renderLayout();
    }
}
