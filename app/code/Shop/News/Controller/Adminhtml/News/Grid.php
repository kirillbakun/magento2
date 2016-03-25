<?php

namespace Shop\News\Controller\Adminhtml\News;

use Shop\News\Controller\Adminhtml\News;

class Grid extends News
{
    public function execute()
    {
        return $this->_resultPageFactory->create();
    }
}