<?php
namespace Addweb\News\Api\Data;

interface NewsInterface {
    /**
     * @return string
     */
    public function getTitle();

    /**
     * @return string|null
     */
    public function getDescription();
    
    /**
     * @return string|null
     */
    public function getStatus();
}
