<?php
/**
 * @param Techy\Sagar\Controller\Index,
 * @param \Magento\Framework\Controller\ResultFactory,
*/
namespace Techy\Sagar\Controller\Index;
use Magento\Framework\Controller\ResultFactory
/**
 * Inherite Action on framework file.
 * @param \Magento\Framework\App\Action\Action
*/
class Edit extends \Magento\Framework\App\Action\Action
{
  /**
   * @Var create
   * @param \Magento\Framework\UrlInterface $url,
   * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory,
   * @param \Techy\Sagar\Model\GridFactory gridFactory
  */
   protected $resultPageFactory;
   private gridFactory;
   private $url;
   /**
    * @constructor Create with param file..
    * @param \Magento\Framework\App\Action\Context $context
   */
   public function __construct(
     \Magento\Framework\UrlInterface $url,
     \Magento\Framework\View\Result\PageFactory $resultPageFactory,
     \Techy\Sagar\Model\GridFactory $gridFactory,
     \Magento\Framework\App\Action\Context $context
     )
   {
      $this->resultPageFactory = $resultPageFactory;
      $this->gridFactory = $gridFactory;
      $this->url = $url;
      parent::__construct($context);
   }
   /**
    * @Excute Main function and logic...
   */
   public function execute()
   {
     if($this->isCorrectData()){
       return $this->resultPageFactory->create();
     }else{
       $this->messageManager->addErrorMessage(__("Record Not Found"));
       $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
       $resultRedirect->setUrl($this->url->getUrl('sagar\index\edit'));
       return $resultRedirect;
     }
   }
   public function isCorrectData()
   {
     if($id = $this->getRequest()->getParam("id")){
       $model = $this->gridFactory->create();
       $model->load($id);
       if($model->getId()){
         return true;
       }else{
         return false;
       }
     }else{
       return true;
     }
   }
}
