<?php

namespace Shop\News\Model\Resource\News;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            'Shop\News\Model\News',
            'Shop\News\Model\Resource\News'
        );
    }
}