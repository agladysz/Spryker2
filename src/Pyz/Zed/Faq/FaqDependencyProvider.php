<?php

namespace Pyz\Zed\Faq;

use Spryker\Zed\Kernel\Container;
use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;

class FaqDependencyProvider extends AbstractBundleDependencyProvider {
    public const QUERY_Faq = 'QUERY_Faq';

    /**    @param  \Spryker\Zed\Kernel\Container $container
     *     @return \Spryker\Zed\Kernel\Container
     *     @throws \Spryker\Service\Container\Exception\ContainerException
     *     @throws \Spryker\Service\Container\Exception\FrozenServiceException */

    public function provideCommunicationLayerDependencies(Container $container): Container {
        $container = $this->addPyzFaqPropelQuery($container);
        return $container;
    }
    /** *   @param  \Spryker\Zed\Kernel\Container $container
     * *    @return \Spryker\Zed\Kernel\Container
     *      @throws \Spryker\Service\Container\Exception\ContainerException
     *      @throws \Spryker\Service\Container\Exception\FrozenServiceException */

    private function addPyzFaqPropelQuery(Container $container): Container
    {
        $container->set(
            static::QUERY_Faq,
            $container->factory(
                fn() => PyzFaqQuery::create()
            )
        );
        return $container;
    }
}
