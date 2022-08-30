<?php
namespace Pyz\Zed\Faq\Business\Faq;

use Generated\Shared\Transfer\FaqTransfer;
use Pyz\Zed\Faq\Persistence\FaqEntityManagerInterface;

class FaqRemover implements FaqRemoverInterface
{
    /** @var \Pyz\Zed\Faq\Persistence\FaqEntityManagerInterface */
    private FaqEntityManagerInterface $FaqEntityManager;

    /**
     * @param \Pyz\Zed\Faq\Persistence\FaqEntityManagerInterface $FaqEntityManager
     */
    public function __construct(FaqEntityManagerInterface $FaqEntityManager)
    {
        $this->FaqEntityManager = $FaqEntityManager;
    }

    /**
     * @param \Generated\Shared\Transfer\FaqTransfer $FaqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    public function remove(FaqTransfer $FaqTransfer): FaqTransfer
    {
        return $this->FaqEntityManager->removeFaq($FaqTransfer);
    }
}
