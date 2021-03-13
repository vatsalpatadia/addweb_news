<?php
namespace Addweb\News\Model;

use Addweb\News\Api\NewsRepositoryInterface;
use Addweb\News\Model\ResourceModel\News\CollectionFactory;
use Magento\Framework\ObjectManagerInterface;

class NewsRepository implements NewsRepositoryInterface
{
    private $collectionFactory;
    
    private $_objectManager;

    public function __construct(CollectionFactory $collectionFactory, ObjectManagerInterface $objectManager)
    {
        $this->collectionFactory = $collectionFactory;
        $this->_objectManager = $objectManager;
    }

    public function getList()
    {
        return $this->collectionFactory->create()->getItems();
    }
    
    public function getNews($id)
    {
        $news = $this->_objectManager->create('\Addweb\News\Model\News')->load($id);
        if (!$news) {
            $this->_throwBadRequest(__('News not found'), Exception::HTTP_NOT_FOUND);
        }
        
        $data[] = $news->getData();
        return $data;
    }
}
