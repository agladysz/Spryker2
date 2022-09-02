<?php

namespace Pyz\Glue\FaqsRestApi\Processor\Faqs;

use Exception;
use Generated\Shared\Transfer\FaqTransfer;
use Generated\Shared\Transfer\RestErrorMessageTransfer;
use Pyz\Client\FaqsRestApi\FaqsRestApiClientInterface;
use Pyz\Glue\FaqsRestApi\Processor\Mapper\FaqsResourceMapper;
use Pyz\Glue\FaqsRestApi\Processor\Mapper\FaqsResourceMapperInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

class FaqsCreator implements FaqsCreatorInterface
{    /** @var \Pyz\Client\FaqsRestApi\FaqsRestApiClientInterface */
    private FaqsRestApiClientInterface $faqsRestApiClient;

    /** @var \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface */
    private RestResourceBuilderInterface $restResourceBuilder;

    /** @var \Pyz\Glue\FaqsRestApi\Processor\Mapper\FaqsResourceMapper */
    private FaqsResourceMapper $faqMapper;

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface $restResourceBuilder
     * @param \Pyz\Glue\FaqsRestApi\Processor\Mapper\FaqsResourceMapperInterface $faqMapper
     */

    public function __construct(
        FaqsRestApiClientInterface $faqsRestApiClient,
        RestResourceBuilderInterface   $restResourceBuilder,
        FaqsResourceMapperInterface $faqMapper
    )
    {
        $this->faqsRestApiClient = $faqsRestApiClient;
        $this->faqRestApiClient = $faqsRestApiClient;
        $this->restResourceBuilder = $restResourceBuilder;
        $this->faqMapper = $faqMapper;
    }

    /**
     * @param RestRequestInterface $restRequest
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */

    public function postFaq(RestRequestInterface $restRequest): RestResponseInterface
    {
        $resourceArray = $restRequest->getResource()->toArray();
        $faqTransfer = (new FaqTransfer())->fromArray($resourceArray);

        $restResponse = $this->restResourceBuilder->createRestResponse();
        $faqTransfer = $this->faqsRestApiClient->addFaq($faqTransfer);

        try {
            $faqTransfer = $this->faqsRestApiClient->changeFaq($faqTransfer);

            return $restResponse;
        } catch(Exception $e) {
            return $restResponse->addError(
                (new RestErrorMessageTransfer())->setStatus(404)
            );
        }
    }

    /**
     * @param RestRequestInterface $restRequest
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */

    public function patchFaq(RestRequestInterface $restRequest): RestResponseInterface
    {
        $resourceArray = $restRequest->getResource()->toArray();
        $faqTransfer = (new FaqTransfer())->fromArray($resourceArray);

        $restResponse = $this->restResourceBuilder->createRestResponse();

        try {
            $faqTransfer = $this->faqsRestApiClient->changeFaq($faqTransfer);

            return $restResponse;
        } catch(Exception $e) {
            return $restResponse->addError(
                (new RestErrorMessageTransfer())->setStatus(404)
            );
        }
    }
}
