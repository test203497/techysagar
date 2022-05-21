<?php
namespace Techy\Sagar\Block;
/**
  * Get File structure on module app..
  * @param Magento\Framework\View\Element\Template;
  * @param Magento\Backend\Block\Template\Context;
  * @param Techy\Sagar\Model\ResourceModel\Grid\CollectionFactory;
*/
use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use Techy\Sagar\Model\ResourceModel\Grid\CollectionFactory;

class Edit extends Template
{
  public $collection;
  public function __construct(Context $context, CollectionFactory $collectionFactory, array $data=[])
  {
    parent::__construct($context, $data);
    $this->collection = $collectionFactory;
  }
  public function getEditAction()
  {
    return $this->getUrl('sagar/index/edit', ['_secure'=>true]);
  }
}
