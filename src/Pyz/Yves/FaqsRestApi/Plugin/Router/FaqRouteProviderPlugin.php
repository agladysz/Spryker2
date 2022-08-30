<?php

namespace Pyz\Yves\FaqsRestApi\Plugin\Router;

use Spryker\Yves\Router\Plugin\RouteProvider\AbstractRouteProviderPlugin;
use Spryker\Yves\Router\Route\RouteCollection;

class FaqRouteProviderPlugin extends AbstractRouteProviderPlugin
{
    protected const ROUTE_FAQ_INDEX = 'faqs-index';

    /**
     * Specification:
     * - Adds Routes to the RouteCollection.
     *
     * @api
     *
     * @param \Spryker\Yves\Router\Route\RouteCollection $routeCollection
     *
     * @return \Spryker\Yves\Router\Route\RouteCollection
     */
    public function addRoutes(RouteCollection $routeCollection): RouteCollection
    {
        $routeCollection = $this->addFaqsRestApiIndexRoute($routeCollection);

        return $routeCollection;
    }

    /**
     * @param \Spryker\Yves\Router\Route\RouteCollection $routeCollection
     *
     * @return \Spryker\Yves\Router\Route\RouteCollection
     */
    protected function addFaqsRestApiIndexRoute(RouteCollection $routeCollection): RouteCollection
    {
        $route = $this->buildRoute('/faqs', 'FaqsRestApi', 'Index', 'indexAction');
        $routeCollection->add(static::ROUTE_FAQ_INDEX, $route);

        return $routeCollection;
    }
}
