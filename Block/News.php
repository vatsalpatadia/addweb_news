<?php
namespace Addweb\News\Block;

class News extends \Magento\Framework\View\Element\Template
{
    public function __construct(\Magento\Framework\View\Element\Template\Context $context ) 
    {
        parent::__construct($context);
    }

    public function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__('Addweb News Module'));
        
        return parent::_prepareLayout();
    }
}
