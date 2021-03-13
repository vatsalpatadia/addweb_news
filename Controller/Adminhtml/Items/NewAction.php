<?php
namespace Addweb\News\Controller\Adminhtml\Items;

class NewAction extends \Addweb\News\Controller\Adminhtml\Items
{

    public function execute()
    {
        $this->_forward('edit');
    }
}
