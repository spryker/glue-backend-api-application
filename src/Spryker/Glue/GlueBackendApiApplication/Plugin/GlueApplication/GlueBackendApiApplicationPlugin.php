<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\GlueBackendApiApplication\Plugin\GlueApplication;

use Generated\Shared\Transfer\ApiContextTransfer;
use Spryker\Glue\JsonApiConvention\Plugin\AbstractGlueJsonRequestApiApplicationPlugin;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ApiApplicationPluginInterface;
use Spryker\Glue\JsonApiConvention\Plugin\RouteRequestMatcherPlugin;

/**
 * @method \Spryker\Glue\GlueBackendApiApplication\GlueBackendApiApplicationFactory getFactory()
 */
class GlueBackendApiApplicationPlugin extends AbstractGlueJsonRequestApiApplicationPlugin implements ApiApplicationPluginInterface
{
    /**
     * @param ApiContextTransfer $apiApplicationContext
     *
     * @return bool
     */
    public function isServing(ApiContextTransfer $apiApplicationContext): bool
    {
        return preg_match('/glue\.us/', (string)$apiApplicationContext->getHost()) > 0;
    }

    /**
     * @return \Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface[]
     */
    public function getApplicationPlugins(): array
    {
        return $this->getFactory()->getApplicationPlugins();
    }

    /**
     * @return RouteRequestMatcherPlugin
     */
    protected function getRouteRequestMatcherPlugin(): RouteRequestMatcherPlugin
    {
        return $this->getFactory()->getRouteRequestMatcherPlugin();
    }
}
