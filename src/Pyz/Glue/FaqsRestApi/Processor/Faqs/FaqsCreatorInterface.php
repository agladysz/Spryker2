<?php
namespace Pyz\Glue\FaqsRestApi\Processor\Faqs;

use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;

use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

interface FaqsCreatorInterface
{
    public function postFaq(RestRequestInterface $restRequest): RestResponseInterface;
    public function patchFaq(RestRequestInterface $restRequest): RestResponseInterface;

}
