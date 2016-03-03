<?php

namespace Shop\News\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Cache\Frontend\Pool;
use Magento\Framework\App\Cache\StateInterface;
use Magento\Framework\App\Cache\TypeListInterface;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected $cacheTypeList;
    protected $cacheState;
    protected $cacheFrontendPool;
    protected $resultPageFactory;
    protected $resultPage;
    protected $newsFactory;

    public function __construct(Context $context, TypeListInterface $cacheTypeList, StateInterface $cacheState,
        Pool $cacheFrontendPool, PageFactory $resultPageFactory)
    {
        parent::__construct($context);
        $this->cacheTypeList = $cacheTypeList;
        $this->cacheState = $cacheState;
        $this->cacheFrontendPool = $cacheFrontendPool;
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $this->resultPage = $this->resultPageFactory->create();
        $this->resultPage->getConfig()->getTitle()->set(__('News'));

        /** @var \Shop\News\Model\News $newsModel */
        /*$newsModel = $this->_objectManager->create('Shop\News\Model\News');
        $news = $newsModel->getAllActiveNews();
        $collection = $newsModel->getCollection();
        var_dump($collection->getData());*/

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        /**
         * @var \Magento\Catalog\Model\ResourceModel\Product\Collection $productCollection
         * @var \Magento\Catalog\Model\Product\Interceptor $product
         */
        $productCollection = $objectManager->create('Magento\Catalog\Model\ResourceModel\Product\Collection');
        $productCollection->load();
        $productCollection->addAttributeToFilter('name', 'test product');

        foreach($productCollection as $product) {
            $url = $product->getProductUrl();
            $a = 1;
        }
        $productsList = $productCollection->getData();
        $a = 1;

		return $this->resultPage;
    }
}
