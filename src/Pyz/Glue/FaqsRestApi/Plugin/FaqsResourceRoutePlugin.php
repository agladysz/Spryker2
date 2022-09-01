<?php

namespace Pyz\Glue\FaqsRestApi\Plugin;

use Generated\Shared\Transfer\RestFaqsResponseAttributesTransfer;
use Pyz\Glue\FaqsRestApi\FaqsRestApiConfig;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRoutePluginInterface;
use Spryker\Glue\Kernel\AbstractPlugin;

/** @method \Pyz\Glue\FaqsRestApi\FaqsRestApiFactory getFactory() */

class FaqsResourceRoutePlugin extends AbstractPlugin implements ResourceRoutePluginInterface {
    public function configure(ResourceRouteCollectionInterface $resourceRouteCollection): ResourceRouteCollectionInterface
    {
<<<<<<< Updated upstream
        $resourceRouteCollection->addGet('get', false);
=======
        $resourceRouteCollection->addGet('get', false)
            ->addDelete('delete', false)->addPatch('patch', false)
            ->addPost('post', false);
>>>>>>> Stashed changes
        return $resourceRouteCollection;
    }
    public function getResourceType(): string
    {
        return FaqsRestApiConfig::RESOURCE_FAQS;
    }
    public function getController(): string
    {
        return 'faqs-resource';
    }
    public function getResourceAttributesClassName(): string
    {
        return RestFaqsResponseAttributesTransfer::class;
    }
}
