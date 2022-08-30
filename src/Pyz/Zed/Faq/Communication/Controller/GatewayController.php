<?php

namespace Pyz\Zed\Faq\Communication\Controller;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;

class GatewayController extends AbstractGatewayController {

    public function getFaqCollectionAction(FaqCollectionTransfer $faqsRestApiTransfer) : FaqCollectionTransfer
    {
        return $this->getFacade()->getFaqCollection($faqsRestApiTransfer);
    }

    public function getFaqAction(FaqTransfer $faqRestApiTransfer) : FaqTransfer
    {
        return $this->getFacade()->getFaq($faqRestApiTransfer);
    }
    public function deleteFaqAction(FaqTransfer $faqRestApiTransfer) : FaqTransfer
    {
        return $this->getFacade()->deleteFaq($faqRestApiTransfer);
    }
    public function postFaqAction(FaqTransfer $faqRestApiTransfer) : FaqTransfer
    {
        return $this->getFacade()->postFaq($faqRestApiTransfer);
    }

}
