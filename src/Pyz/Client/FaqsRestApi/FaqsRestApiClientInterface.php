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
    /**
     * @api
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    public function getFaq(FaqTransfer $faqTransfer, int $id): FaqTransfer;
}
