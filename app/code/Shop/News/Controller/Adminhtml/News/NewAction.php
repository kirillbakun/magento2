<?php

namespace Shop\News\Controller\Adminhtml\News;

use Shop\News\Controller\Adminhtml\News;

class NewAction extends News
{
    public function execute()
    {
        $this->_forward('edit');
    }
}