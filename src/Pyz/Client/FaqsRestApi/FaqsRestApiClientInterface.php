<?php

namespace Pyz\Client\FaqsRestApi;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqTransfer;

interface FaqsRestApiClientInterface
{
    /**
     * @api
     * @return \Generated\Shared\Transfer\FaqCollectionTransfer
     */
    public function getFaqCollection(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer;
    public function getFaq(FaqTransfer $faqTransfer): FaqTransfer;
    public function addFaq(FaqTransfer $faqTransfer): FaqTransfer;
    public function deleteFaq(FaqTransfer $faqTransfer): FaqTransfer;
    public function changeFaq(FaqTransfer $faqTransfer): FaqTransfer;

}
