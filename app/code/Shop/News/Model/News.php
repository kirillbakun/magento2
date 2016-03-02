<?php

namespace Shop\News\Model;

use Magento\Framework\Model\AbstractModel;

class News extends AbstractModel
{
    protected $resourceConnection;

    protected function _construct()
    {
        $this->_init('Shop\News\Model\Resource\News');
    }

    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\App\ResourceConnection $resourceConnection,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        $this->resourceConnection = $resourceConnection;

        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    public function getAllActiveNews()
    {
        $news = array();

        $tableName = $this->resourceConnection->getTableName('shop_news');
        $query = 'SELECT *
            FROM ' .$tableName .'
            WHERE `status` = 1';

        $queryResult = $this->resourceConnection->getConnection()->query($query);
        while($row = $queryResult->fetch()) {
            $news[] = $row;
        }

        return $news;
    }
}