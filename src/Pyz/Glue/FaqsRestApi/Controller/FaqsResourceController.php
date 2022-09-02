<?php

namespace Pyz\Glue\FaqsRestApi\Controller;

use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;
use Spryker\Glue\Kernel\Controller\AbstractController;

/**
 * @method \Pyz\Glue\FaqsRestApi\FaqsRestApiFactory getFactory()
 */
class FaqsResourceController extends AbstractController
{
    /**
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function getAction(RestRequestInterface $restRequest): RestResponseInterface
    {
        if(is_null($restRequest->getResource()->getId())){
            return $this->getFactory()
                ->createFaqsReader()
                ->getFaqs($restRequest);
        } else {
            return $this->getFactory()
                ->createFaqsReader()
                ->getFaq($restRequest);
        }
    }

    public function postAction(RestRequestInterface $restRequest): RestResponseInterface
    {
        return $this->getFactory()->createFaqsCreator()->postFaq($restRequest);
    }

    public function patchAction(RestRequestInterface $restRequest): RestResponseInterface
    {
       return $this->getFactory()->createFaqsCreator()->patchFaq($restRequest);
    }

    public function deleteAction(RestRequestInterface $restRequest): RestResponseInterface
    {
        return $this->getFactory()->createFaqsDeleter()->deleteFaq($restRequest);
    }

}
