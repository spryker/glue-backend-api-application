<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\GlueBackendApiApplication\Router\RouterResource;

use Spryker\Glue\GlueBackendApiApplication\Router\Route\RouteCollection;

class RouterResource implements RouterResourceInterface
{
    /**
     * @var \Spryker\Glue\GlueBackendApiApplication\Router\Route\RouteCollection
     */
    protected RouteCollection $routeCollection;

    /**
     * @var array<\Spryker\Glue\GlueBackendApiApplicationExtension\Dependency\Plugin\RouteProviderPluginInterface>
     */
    protected $routeProviderPlugins = [];

    /**
     * @param \Spryker\Glue\GlueBackendApiApplication\Router\Route\RouteCollection $routeCollection
     * @param array<\Spryker\Glue\GlueBackendApiApplicationExtension\Dependency\Plugin\RouteProviderPluginInterface> $routeProviderPlugins
     */
    public function __construct(RouteCollection $routeCollection, array $routeProviderPlugins)
    {
        $this->routeCollection = $routeCollection;
        $this->routeProviderPlugins = $routeProviderPlugins;
    }

    /**
     * @return \Spryker\Glue\GlueBackendApiApplication\Router\Route\RouteCollection
     */
    public function __invoke(): RouteCollection
    {
        foreach ($this->routeProviderPlugins as $routeProviderPlugin) {
            $this->routeCollection = $routeProviderPlugin->addRoutes($this->routeCollection);
        }

        return $this->routeCollection;
    }
}
