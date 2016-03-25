<?php

namespace Shop\News\Controller\Adminhtml\News;

use Shop\News\Controller\Adminhtml\News;

class Index extends News
{
    public function execute()
    {
        if ($this->getRequest()->getQuery('ajax')) {
            $this->_forward('grid');
            return;
        }

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Shop_News::news_add');
        $resultPage->getConfig()->getTitle()->prepend(__('News'));

        return $resultPage;
    }
}