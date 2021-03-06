<?php
namespace Addweb\News\Block\Adminhtml\Items\Edit;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('addweb_news_items_edit_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('News'));
    }
}
