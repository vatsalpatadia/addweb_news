<?php
namespace Addweb\News\Model;

use Magento\Framework\Model\AbstractModel;

class News extends AbstractModel
{
    
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }
    
    /**
     * Define resource model
     */
    protected function _construct()
    {
        $this->_init('Addweb\News\Model\ResourceModel\News');
    }
    
    /**
     * Loading news data
     *
     * @param   mixed $key
     * @param   string $field
     * @return  $this
     */
    public function load($key, $field = null) {
    	if ($field === null) {
    		$this->_getResource()->load($this, $key, 'news_id');
    		return $this;
    	}
    	$this->_getResource()->load($this, $key, $field);
    	return $this;
    }
}