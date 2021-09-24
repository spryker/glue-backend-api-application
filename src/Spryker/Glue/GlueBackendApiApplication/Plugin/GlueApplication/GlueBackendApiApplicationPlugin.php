<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\GlueBackendApiApplication\Plugin\GlueApplication;

use Spryker\Glue\GlueJsonApi\Plugin\AbstractGlueJsonApiApplicationPlugin;
use Spryker\Glue\GlueApplication\ApiApplication\ApiApplicationContext;
use Spryker\Glue\GlueApplication\Plugin\ApiApplication\HostApplicationApiContextExpander;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ApiApplicationPluginInterface;
use Spryker\Glue\GlueJsonApi\Plugin\RouteRequestMatcherPlugin;

/**
 * @method \Spryker\Glue\GlueBackendApiApplication\GlueBackendApiApplicationFactory getFactory()
 */
class GlueBackendApiApplicationPlugin extends AbstractGlueJsonApiApplicationPlugin implements ApiApplicationPluginInterface
{
    /**
     * @param \Spryker\Glue\GlueApplication\ApiApplication\ApiApplicationContext $apiApplicationContext
     *
     * @return bool
     */
    public function isServing(ApiApplicationContext $apiApplicationContext): bool
    {
        return (
            $apiApplicationContext->has(HostApplicationApiContextExpander::HOST)
            && preg_match('/glue\.us/', $apiApplicationContext->get('host')) > 0
        );
    }

    /**
     * @return \Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface[]
     */
    public function getApplicationPlugins(): array
    {
        return $this->getFactory()->getApplicationPlugins();
    }

    protected function getRouteRequestMatcherPlugin(): RouteRequestMatcherPlugin
    {
        return $this->getFactory()->getRouteRequestMatcherPlugin();
    }


}
