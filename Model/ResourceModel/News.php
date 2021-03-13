<?php
namespace Addweb\News\Model\ResourceModel;

class News extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Define main table
     */
    protected function _construct()
    {
        $this->_init('addweb_news', 'news_id');
    }
}