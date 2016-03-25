<?php

namespace Shop\News\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Shop\News\Model\NewsFactory;

abstract class News extends Action
{
    protected $_coreRegistry;
    protected $_resultPageFactory;
    protected $_newsFactory;

    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory,
        NewsFactory $newsFactory
    )
    {
        parent::__construct($context);
        $this->_coreRegistry = $coreRegistry;
        $this->_resultPageFactory = $resultPageFactory;
        $this->_newsFactory = $newsFactory;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Shop_News::news_add');
    }
}