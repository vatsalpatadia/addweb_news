<?php
namespace Addweb\News\Api;

interface NewsRepositoryInterface {
     /**
     * @return \Addweb\News\Api\Data\NewsInterface[]
     */
    public function getList();
    
    /**
     * @param int $id
     * @return array
     */
    public function getNews($id);
}
