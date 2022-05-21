<?php

namespace Techy\Sagar\Controller\Index;

class Delete extends \Magento\Framework\App\Action\Action
{
     protected $_pageFactory;
     protected $_request;
     protected $gridFactory;

     public function __construct(
          \Magento\Framework\App\Action\Context $context,
          \Magento\Framework\View\Result\PageFactory $pageFactory,
          \Magento\Framework\App\Request\Http $request,
          \Techy\Sagar\Model\GridFactory $gridFactory
     ){
          $this->_pageFactory = $pageFactory;
          $this->_request = $request;
          $this->gridFactory = $gridFactory;
          return parent::__construct($context);
     }

     public function execute()
     {
          $id = $this->_request->getParam('id');
          $postData = $this->gridFactory->create();
          //var_dump($postData);
          $result = $postData->setId($id);
          $result = $result->delete();
          return $this->_redirect('sagar');
           //return $result;
     }
}
