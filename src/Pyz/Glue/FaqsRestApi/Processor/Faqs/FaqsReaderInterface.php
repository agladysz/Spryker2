<?php
namespace Pyz\Glue\FaqsRestApi\Processor\Faqs;

use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;

use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

interface FaqsReaderInterface
{
    /**
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function getFaqs(RestRequestInterface $restRequest): RestResponseInterface;
    public function getFaq(RestRequestInterface $restRequest): RestResponseInterface;

    public function postFaq(RestRequestInterface $restRequest): RestResponseInterface;
    public function patchFaq(RestRequestInterface $restRequest): RestResponseInterface;
    public function deleteFaq(RestRequestInterface $restRequest): RestResponseInterface;

}
