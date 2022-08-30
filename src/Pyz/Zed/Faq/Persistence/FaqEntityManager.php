<?php
namespace Pyz\Zed\Faq\Persistence;

use Generated\Shared\Transfer\FaqTransfer;
use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

class FaqEntityManager extends AbstractEntityManager implements FaqEntityManagerInterface
{
    /**
     * @param \Generated\Shared\Transfer\FaqTransfer $FaqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function saveFaq(FaqTransfer $FaqTransfer): FaqTransfer
    {
        $FaqEntity = $this->createPyzFaqQuery()
            ->filterByIdFaq($FaqTransfer->getIdFaq())
            ->findOneOrCreate();

        // fill up entity
        $FaqEntity->fromArray($FaqTransfer->toArray());
        $FaqEntity->save();

        // update transfer based on entity (like id_Faq field)
        $FaqTransfer->fromArray($FaqEntity->toArray());

        return $FaqTransfer;
    }
    public function removeFaq(FaqTransfer $FaqTransfer): FaqTransfer
    {
        $FaqEntity = $this->createPyzFaqQuery()
            ->filterByIdFaq($FaqTransfer->getIdFaq())
            ->findOneOrCreate();

        // fill up entity
        $FaqEntity->fromArray($FaqTransfer->toArray());
        $FaqEntity->delete();

        // update transfer based on entity (like id_Faq field)
        $FaqTransfer->fromArray($FaqEntity->toArray());

        return $FaqTransfer;
    }
    /**
     * @return \Orm\Zed\Faq\Persistence\PyzFaqQuery
     */
    private function createPyzFaqQuery(): PyzFaqQuery
    {
        return PyzFaqQuery::create();
    }
}
