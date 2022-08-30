<?php
namespace Pyz\Zed\Faq\Communication\Table;

use Spryker\Zed\Gui\Communication\Table\AbstractTable;
use Spryker\Zed\Gui\Communication\Table\TableConfiguration;
use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Orm\Zed\Faq\Persistence\Map\PyzFaqTableMap;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class FaqTable extends AbstractTable
{
    /** @var \Orm\Zed\Faq\Persistence\PyzFaqQuery */
    private const COL_EDIT = "edit";
    private const COL_DELETE = "delete";

    private PyzFaqQuery $faqQuery;

    /**
     * @param \Orm\Zed\Faq\Persistence\PyzFaqQuery $faqQuery
     */
    public function __construct(PyzFaqQuery $faqQuery)
    {
        $this->faqQuery = $faqQuery;
    }


    /**
         * @param \Spryker\Zed\Gui\Communication\Table\TableConfiguration $config
         *
         * @return \Spryker\Zed\Gui\Communication\Table\TableConfiguration
         */
    protected function configure(TableConfiguration $config): TableConfiguration
    {
        $config->setHeader([
            PyzFaqTableMap::COL_QUESTION => 'Question',
            PyzFaqTableMap::COL_ANSWER => 'Answer',
            PyzFaqTableMap::COL_ACTIVATED => 'Activated',
            PyzFaqTableMap::COL_VOTES_COUNTER => 'Votes Number',
            self::COL_EDIT => 'Edit',
            self::COL_DELETE => 'Delete'
        ]);

        $config->setSortable([
            PyzFaqTableMap::COL_ACTIVATED,
            PyzFaqTableMap::COL_VOTES_COUNTER
        ]);

        $config->setSearchable([
            PyzFaqTableMap::COL_QUESTION
        ]);

        $config->setRawColumns([
            self::COL_EDIT,
            self::COL_DELETE
        ]);

        return $config;
    }

    /**
     * @inheritDoc
     */
    /**
     * @param \Spryker\Zed\Gui\Communication\Table\TableConfiguration $config
     *
     * @return array
     */
    protected function prepareData(TableConfiguration $config): array
    {
        $FaqDataItems = $this->runQuery($this->faqQuery, $config);
        $FaqTableRows = [];

        foreach ($FaqDataItems as $FaqDataItem) {
            $FaqTableRows[] = [
                PyzFaqTableMap::COL_QUESTION => $FaqDataItem[PyzFaqTableMap::COL_QUESTION],
                PyzFaqTableMap::COL_ANSWER => $FaqDataItem[PyzFaqTableMap:: COL_ANSWER],
                PyzFaqTableMap::COL_ACTIVATED => $FaqDataItem[PyzFaqTableMap:: COL_ACTIVATED],
                PyzFaqTableMap::COL_VOTES_COUNTER => $FaqDataItem[PyzFaqTableMap:: COL_VOTES_COUNTER],
                self::COL_EDIT => $this->generateCreateButton('/faq/edit?id-faq=' . $FaqDataItem[PyzFaqTableMap::COL_ID_FAQ], 'Edit'),
                self::COL_DELETE => $this->generateRemoveButton('/faq/delete?id-faq=' . $FaqDataItem[PyzFaqTableMap::COL_ID_FAQ], 'Delete')
            ];
        }

        return $FaqTableRows;
    }
}
