<?php

namespace Pyz\Glue\FaqsRestApi;

use Pyz\Glue\FaqsRestApi\Processor\Faqs\FaqsDeleter;
use Pyz\Glue\FaqsRestApi\Processor\Faqs\FaqsDeleterInterface;
use Pyz\Glue\FaqsRestApi\Processor\Faqs\FaqsCreator;
use Pyz\Glue\FaqsRestApi\Processor\Faqs\FaqsCreatorInterface;
use Pyz\Glue\FaqsRestApi\Processor\Faqs\FaqsReader;
use Pyz\Glue\FaqsRestApi\Processor\Faqs\FaqsReaderInterface;
use Pyz\Glue\FaqsRestApi\Processor\Mapper\FaqsResourceMapper;
use Spryker\Glue\Kernel\AbstractFactory;

/**
 * @method \Pyz\Client\FaqsRestApi\FaqsRestApiClientInterface getClient()
 */

class FaqsRestApiFactory extends AbstractFactory
{
    public function createFaqsResourceMapper(): FaqsResourceMapper
    {
        return new FaqsResourceMapper();
    }

    public function createFaqsReader(): FaqsReaderInterface
    {
        return new FaqsReader(
            $this->getClient(),
            $this->getResourceBuilder(),
            $this->createFaqsResourceMapper()
        );
    }

    public function createFaqsCreator(): FaqsCreatorInterface
    {
        return new FaqsCreator(
            $this->getClient(),
            $this->getResourceBuilder(),
            $this->createFaqsResourceMapper()
        );
    }
    public function createFaqsDeleter(): FaqsDeleterInterface
    {
        return new FaqsDeleter(
            $this->getClient(),
            $this->getResourceBuilder(),
            $this->createFaqsResourceMapper()
        );
    }

}
