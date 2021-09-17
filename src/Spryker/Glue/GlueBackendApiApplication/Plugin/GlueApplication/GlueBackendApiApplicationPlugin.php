<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\GlueBackendApiApplication\Plugin\GlueApplication;

use Spryker\Glue\GlueApplication\ApiApplication\ApiApplicationContext;
use Spryker\Glue\GlueApplication\Plugin\ApiApplication\HostApplicationApiContextExpander;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ApiApplicationPluginInterface;
use Spryker\Glue\Kernel\AbstractPlugin;
use Spryker\Glue\Kernel\Container;

/**
 * @method \Spryker\Glue\GlueBackendApiApplication\GlueBackendApiApplicationFactory getFactory()
 */
class GlueBackendApiApplicationPlugin extends AbstractPlugin implements ApiApplicationPluginInterface
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
     * @return \Spryker\Glue\Kernel\Backend\Container
     */
    public function getDependencyContainer(): Container
    {
        return $this->getFactory()->getDependencyContainer();
    }
}
