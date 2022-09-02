<?php

namespace Pyz\Client\FaqsRestApi;

use Generated\Shared\Transfer\FaqTransfer;
use Generated\Shared\Transfer\FaqCollectionTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \Pyz\Client\FaqsRestApi\FaqsRestApiFactory getFactory()
 */
class FaqsRestApiClient extends AbstractClient implements FaqsRestApiClientInterface
{
    /**
     * @api
     * @return \Generated\Shared\Transfer\FaqCollectionTransfer
     */
    public function getFaqCollection(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer
    {
        return $this->getFactory()
            ->createFaqZedStub()
            ->getFaqCollection($faqCollectionTransfer);
    }
    /**
     * @api
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    public function getFaq(FaqTransfer $faqTransfer): FaqTransfer
    {
        return $this->getFactory()
            ->createFaqZedStub()
            ->getFaq($faqTransfer);
    }
    /**
     * @api
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    public function deleteFaq(FaqTransfer $faqTransfer): FaqTransfer
    {
        return $this->getFactory()
            ->createFaqZedStub()
            ->deleteFaq($faqTransfer);
    }
    /**
     * @api
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    public function addFaq(FaqTransfer $faqTransfer): FaqTransfer
    {
        return $this->getFactory()
            ->createFaqZedStub()
            ->addFaq($faqTransfer);
    }
    /**
     * @api
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    public function changeFaq(FaqTransfer $faqTransfer): FaqTransfer
    {
        return $this->getFactory()
            ->createFaqZedStub()
            ->changeFaq($faqTransfer);
    }
}
