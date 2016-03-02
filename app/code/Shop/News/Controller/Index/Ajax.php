<?php

namespace Shop\News\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Cache\Frontend\Pool;
use Magento\Framework\App\Cache\StateInterface;
use Magento\Framework\App\Cache\TypeListInterface;
use Magento\Framework\View\Result\PageFactory;

class Ajax extends Action
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
        $a = 1;
    }
}