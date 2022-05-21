<?php
namespace Techy\Sagar\Block;
use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
class Insert extends Template
{
public function __construct(Context $context, array $data = [])
{
  parent::__construct($context, $data);
}
public function getInsertAction()
{
  return $this->getUrl('sagar/index/save', ['_secure' => true]);
}
}
