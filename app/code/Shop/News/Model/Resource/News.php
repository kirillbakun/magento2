<?php

namespace Shop\News\Model\Resource;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class News extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('shop_news', 'id');
    }
}