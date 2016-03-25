<?php

namespace Shop\News\Controller\Adminhtml\News;

use Shop\News\Controller\Adminhtml\News;

class Save extends News
{
    public function execute()
    {
        if($this->getRequest()->getPost()) {
            $newsModel = $this->_newsFactory->create();
            $newsId = $this->getRequest()->getParam('id');

            if ($newsId) {
                $newsModel->load($newsId);
            }
            $formData = $this->getRequest()->getParam('news');
            $newsModel->setData($formData);

            try {
                $newsModel->save();
                $this->messageManager->addSuccess(__('The news has been saved.'));

                // Check if 'Save and Continue'
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', ['id' => $newsModel->getId(), '_current' => true]);
                    return;
                }

                // Go to grid page
                $this->_redirect('*/*/');
                return;
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }

            $this->_getSession()->setFormData($formData);
            $this->_redirect('*/*/edit', ['id' => $newsId]);
        }
    }
}