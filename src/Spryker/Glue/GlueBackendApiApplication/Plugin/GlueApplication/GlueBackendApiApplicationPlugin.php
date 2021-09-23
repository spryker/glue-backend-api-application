<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\GlueBackendApiApplication\Plugin\GlueApplication;

use Spryker\Glue\GlueApplication\ApiApplication\ApiApplicationContext;
use Spryker\Glue\GlueApplication\Plugin\ApiApplication\HostApplicationApiContextExpander;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ApiApplicationPluginInterface;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRelationshipCollectionInterface;
use Spryker\Glue\Kernel\AbstractPlugin;

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
     * @return \Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface[]
     */
    public function getApplicationPlugins(): array
    {
        return $this->getFactory()->getApplicationPlugins();
    }

    /**
     * Rest resource route plugin stack
     *
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRoutePluginInterface[]
     */
    public function getResourceRoutePlugins(): array
    {
        return $this->getFactory()->getResourceRoutePlugins();
    }

    /**
     * Rest resource relation provider plugin collection, plugins must construct full resource by resource ids.
     *
     * @param \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRelationshipCollectionInterface $resourceRelationshipCollection
     *
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRelationshipCollectionInterface
     */
    public function getResourceRelationshipPlugins(
        ResourceRelationshipCollectionInterface $resourceRelationshipCollection
    ): ResourceRelationshipCollectionInterface {
        return $this->getFactory()->getResourceRelationshipPlugins($resourceRelationshipCollection);
    }

    /**
     * Validate http request plugins
     *
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ValidateHttpRequestPluginInterface[]
     */
    public function getValidateHttpRequestPlugins(): array
    {
        return $this->getFactory()->getValidateHttpRequestPlugins();
    }

    /**
     * Plugins that called before processing {@link \Spryker\Glue\Kernel\Controller\FormattedAbstractController}.
     *
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\FormattedControllerBeforeActionPluginInterface[]
     */
    public function getFormattedControllerBeforeActionTerminatePlugins(): array
    {
        return $this->getFactory()->getFormattedControllerBeforeActionTerminatePlugins();
    }

    /**
     * Format/Parse http request to internal rest resource request
     *
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\FormatRequestPluginInterface[]
     */
    public function getFormatRequestPlugins(): array
    {
        return $this->getFactory()->getFormatRequestPlugins();
    }

    /**
     * Format response data the data which will send with http response
     *
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\FormatResponseDataPluginInterface[]
     */
    public function getFormatResponseDataPlugins(): array
    {
        return $this->getFactory()->getFormatResponseDataPlugins();
    }

    /**
     * Format/add additional response headers
     *
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\FormatResponseHeadersPluginInterface[]
     */
    public function getFormatResponseHeadersPlugins(): array
    {
        return $this->getFactory()->getFormatResponseHeadersPlugins();
    }

    /**
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ValidateRestRequestPluginInterface[]
     */
    public function getValidateRestRequestPlugins(): array
    {
        return $this->getFactory()->getValidateRestRequestPlugins();
    }

    /**
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\RestRequestValidatorPluginInterface[]
     */
    public function getRestRequestValidatorPlugins(): array
    {
        return $this->getFactory()->getRestRequestValidatorPlugins();
    }

    /**
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\RestUserValidatorPluginInterface[]
     */
    public function getRestUserValidatorPlugins(): array
    {
        return $this->getFactory()->getRestUserValidatorPlugins();
    }

    /**
     * Called before invoking controller action
     *
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ControllerBeforeActionPluginInterface[]
     */
    public function getControllerBeforeActionPlugins(): array
    {
        return $this->getFactory()->getControllerBeforeActionPlugins();
    }

    /**
     * Called after done processing controller action
     *
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ControllerAfterActionPluginInterface[]
     */
    public function getControllerAfterActionPlugins(): array
    {
        return $this->getFactory()->getControllerAfterActionPlugins();
    }

    /**
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\RestUserFinderPluginInterface[]
     */
    public function getRestUserFinderPlugins(): array
    {
        return $this->getFactory()->getRestUserFinderPlugins();
    }

    /**
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\RouterParameterExpanderPluginInterface[]
     */
    public function getRouterParameterExpanderPlugins(): array
    {
        return $this->getFactory()->getRouterParameterExpanderPlugins();
    }
}
