<?php

/**
* Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
* Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
*/

namespace Spryker\Glue\GlueBackendApiApplication;

use Spryker\Glue\GlueJsonApi\Plugin\RouteRequestMatcherPlugin;
use Spryker\Glue\Kernel\Backend\Factory\AbstractFactory;

class GlueBackendApiApplicationFactory extends AbstractFactory
{
    /**
     * @return \Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface[]
     */
    public function getApplicationPlugins(): array
    {
        return $this->getProvidedDependency(GlueBackendApiApplicationDependencyProvider::PLUGIN_APPLICATIONS);
    }

    /**
     * @return RouteRequestMatcherPlugin
     */
    public function getRouteRequestMatcherPlugin(): RouteRequestMatcherPlugin
    {
        return $this->getProvidedDependency(GlueBackendApiApplicationDependencyProvider::PLUGIN_REQUEST_MATCHER);
    }
}
