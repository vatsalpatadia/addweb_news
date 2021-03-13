<?php
namespace Addweb\News\Model\ResourceModel\News;
 
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'news_id';
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'Addweb\News\Model\News',
            'Addweb\News\Model\ResourceModel\News'
        );
    }
}