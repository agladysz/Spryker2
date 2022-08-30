<?php
namespace Pyz\Zed\Faq\Persistence;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqTransfer;
use Orm\Zed\Faq\Persistence\PyzFaq;
use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

class FaqRepository extends AbstractRepository implements FaqRepositoryInterface
{
    /**
     * @param int $idFaq
     *
     * @return \Generated\Shared\Transfer\FaqTransfer|null
     */
    public function findFaqById(int $idFaq): ?FaqTransfer
    {
        $FaqEntity = $this->createPyzFaqQuery()
            ->findOneByIdFaq($idFaq);
        /* $FaqEntity = $this
            ->createPyzFaqQuery()
            ->filterByIdFaq($idFaq)
            ->findOne(); */

        if (!$FaqEntity) {
            return null;
        }

        return $this->mapEntityToTransfer($FaqEntity);
    }

    /**
     * @return \Orm\Zed\Faq\Persistence\PyzFaqQuery
     */
    private function createPyzFaqQuery(): PyzFaqQuery
    {
        return PyzFaqQuery::create();
    }

    /**
     * @param \Orm\Zed\Faq\Persistence\PyzFaq $FaqEntity
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    private function mapEntityToTransfer(PyzFaq $FaqEntity): FaqTransfer
    {
        return (new FaqTransfer())->fromArray($FaqEntity->toArray());
    }

    /**
     * @param \Generated\Shared\Transfer\FaqCollectionTransfer $FaqsRestApiTransfer
     * @return \Generated\Shared\Transfer\FaqCollectionTransfer $FaqsRestApiTransfer
     */
    public function getFaqCollection(FaqCollectionTransfer $faqsRestApiTransfer): FaqCollectionTransfer
    {
        $FaqCollection = $this->createPyzFaqQuery()
            ->find();

        foreach ($FaqCollection as $FaqEntity) {
            $faqTransfer = $this->mapEntityToTransfer($FaqEntity);
            $faqsRestApiTransfer->addFaq($faqTransfer);
        }

        return $faqsRestApiTransfer;
    }

    public function getFaq(FaqTransfer $faqRestApiTransfer): FaqTransfer
    {
        $FaqCollection = $this->findFaqById($faqRestApiTransfer->getIdFaq());
        return $FaqCollection;
    }

}
