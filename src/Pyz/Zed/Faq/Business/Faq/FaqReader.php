<?php
namespace Pyz\Zed\Faq\Business\Faq;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqTransfer;
use Pyz\Zed\Faq\Persistence\FaqRepositoryInterface;

class FaqReader implements FaqReaderInterface
{
    /** @var \Pyz\Zed\Faq\Persistence\FaqRepositoryInterface */
    private FaqRepositoryInterface $FaqRepository;

    /**
     * @param \Pyz\Zed\Faq\Persistence\FaqRepositoryInterface $FaqRepository
     */
    public function __construct(FaqRepositoryInterface $FaqRepository)
    {
        $this->FaqRepository = $FaqRepository;
    }

    /**
     * @param int $idFaq
     *
     * @return \Generated\Shared\Transfer\FaqTransfer|null
     */
    public function findFaqById(int $idFaq): ?FaqTransfer
    {
        return $this->FaqRepository->findFaqById($idFaq);
    }

    public function getFaqCollection(FaqCollectionTransfer $faqsRestApiTransfer): FaqCollectionTransfer
    {
        return $this->FaqRepository->getFaqCollection($faqsRestApiTransfer);
    }

    public function getFaq(FaqTransfer $faqRestApiTransfer): FaqTransfer
    {
        return $this->FaqRepository->getFaq($faqRestApiTransfer);
    }

}
