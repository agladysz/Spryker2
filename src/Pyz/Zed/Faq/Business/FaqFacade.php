<?php
namespace Pyz\Zed\Faq\Business;

use Generated\Shared\Transfer\FaqTransfer;
use Generated\Shared\Transfer\FaqCollectionTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;
/**
 * @method \Pyz\Zed\Faq\Business\FaqBusinessFactory getFactory()
 */

class FaqFacade extends AbstractFacade implements FaqFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FaqTransfer $FaqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    public function saveFaq(FaqTransfer $FaqTransfer): FaqTransfer
    {
        return $this->getFactory()
            ->createFaqSaver()
            ->save($FaqTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FaqTransfer $FaqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     */

    public function removeFaq(FaqTransfer $FaqTransfer): FaqTransfer
    {
        return $this->getFactory()
            ->createFaqRemover()
            ->remove($FaqTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param int $idFaq
     *
     * @return \Generated\Shared\Transfer\FaqTransfer|null
     */
    public function findFaqById(int $idFaq): ?FaqTransfer
    {
        return $this->getFactory()
            ->createFaqReader()
            ->findFaqById($idFaq);
    }

    /**
     * @param \Generated\Shared\Transfer\FaqCollectionTransfer $FaqsRestApiTransfer
     * @return \Generated\Shared\Transfer\FaqCollectionTransfer $FaqsRestApiTransfer
     */
    public function getFaqCollection(FaqCollectionTransfer $FaqsRestApiTransfer): FaqCollectionTransfer
    {
        return $this->getFactory()
            ->createFaqReader()
            ->getFaqCollection($FaqsRestApiTransfer);
    }
    /**
     * @param \Generated\Shared\Transfer\FaqTransfer $FaqsRestApiTransfer
     * @return \Generated\Shared\Transfer\FaqTransfer $FaqsRestApiTransfer
     */
    public function getFaq(FaqTransfer $FaqRestApiTransfer): FaqTransfer
    {
        return $this->getFactory()
            ->createFaqReader()
            ->getFaq($FaqRestApiTransfer);
    }
}

