<?php

namespace Shop\News\Helper;

use Magento\Framework\App\Helper\Context;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
	/**
     * @param \Magento\Framework\App\Helper\Context $context
     */
	public function __construct(Context $context)
	{
		parent::__construct($context);
	}
}