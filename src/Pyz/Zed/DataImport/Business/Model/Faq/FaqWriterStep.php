<?php

namespace Pyz\Zed\DataImport\Business\Model\Faq;

use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\PublishAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class FaqWriterStep extends PublishAwareStep implements DataImportStepInterface
{
    public const KEY_QUESTION = 'question';
    public const KEY_ANSWER = 'answer';
    public const KEY_ACTIVATED = 'activated';
    public const KEY_VOTES_COUNTER = 'votes_counter';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     * @throws \Spryker\Zed\DataImport\Business\Exception\EntityNotFoundException
     *
     */
    public function execute(DataSetInterface $dataSet)
    {
        $FaqEntity = PyzFaqQuery::create()
            ->filterByQuestion($dataSet[static::KEY_QUESTION])
            ->findOneOrCreate();

        $FaqEntity->setAnswer
        ($dataSet[static::KEY_ANSWER]);

        $FaqEntity->setActivated
        ($dataSet[static::KEY_ACTIVATED]);

        $FaqEntity->setVotesCounter
        ($dataSet[static::KEY_VOTES_COUNTER]);


        if ($FaqEntity->isNew() || $FaqEntity->isModified()) {
            $FaqEntity->save();
        }
    }
}
