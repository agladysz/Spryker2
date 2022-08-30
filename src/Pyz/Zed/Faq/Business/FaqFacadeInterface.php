<?php
namespace Pyz\Zed\Faq\Business;

use Generated\Shared\Transfer\FaqTransfer;
use Generated\Shared\Transfer\FaqCollectionTransfer;

interface FaqFacadeInterface

{
    /**
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FaqTransfer $FaqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    public function removeFaq(FaqTransfer $FaqTransfer): FaqTransfer;

    /**
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FaqTransfer $FaqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    public function saveFaq(FaqTransfer $FaqTransfer): FaqTransfer;

    /**
     * Specification:
     * - returns Faq if exists based on its ID
     * - returns null if no such record is found
     *
     * @param int $idFaq
     *
     * @return \Generated\Shared\Transfer\FaqTransfer|null
     */
    public function findFaqById(int $idFaq): ?FaqTransfer;
    public function getFaqCollection(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer;
}
