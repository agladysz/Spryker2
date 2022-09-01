<?php
namespace Pyz\Zed\Faq\Business;

use Generated\Shared\Transfer\FaqTransfer;

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
<<<<<<< Updated upstream
=======
    public function getFaqCollection(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer;
    public function changeFaq(FaqTransfer $FaqRestApiTransfer): FaqTransfer;
    public function getFaq(FaqTransfer $faqTransfer): FaqTransfer;
>>>>>>> Stashed changes

}
