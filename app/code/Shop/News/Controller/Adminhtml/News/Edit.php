<?php

namespace Shop\News\Controller\Adminhtml\News;

use Shop\News\Controller\Adminhtml\News;

class Edit extends News
{
    public function execute()
    {
        $newsId = $this->getRequest()->getParam('id');
        /** @var \Shop\News\Model\News $model */
        $model = $this->_newsFactory->create();

        if ($newsId) {
            $model->load($newsId);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This news no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }
        }

        // Restore previously entered form data from session
        $data = $this->_session->getNewsData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
        $this->_coreRegistry->register('news_news', $model);

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Shop_News::news_add');
        $resultPage->getConfig()->getTitle()->prepend(__('News'));

        return $resultPage;
    }
}