<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\GlueBackendApiApplication\Router;

use Generated\Shared\Transfer\GlueRequestTransfer;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceInterface;
use Spryker\Glue\GlueBackendApiApplication\Resource\GenericResource;
use Spryker\Glue\GlueBackendApiApplication\Resource\MissingResource;
use Spryker\Glue\GlueBackendApiApplicationExtension\Dependency\Plugin\RequestResourceFilterPluginInterface;
use Symfony\Component\HttpFoundation\Response;

class RequestRoutingMatcher implements RequestRoutingMatcherInterface
{
    /**
     * @var \Spryker\Glue\GlueBackendApiApplication\Router\ChainRouterInterface
     */
    protected ChainRouterInterface $chainRouter;

    /**
     * @var \Spryker\Glue\GlueBackendApiApplicationExtension\Dependency\Plugin\RequestResourceFilterPluginInterface
     */
    protected RequestResourceFilterPluginInterface $requestResourceFilterPlugin;

    /**
     * @param \Spryker\Glue\GlueBackendApiApplication\Router\ChainRouterInterface $chainRouter
     * @param \Spryker\Glue\GlueBackendApiApplicationExtension\Dependency\Plugin\RequestResourceFilterPluginInterface $requestResourceFilterPlugin
     */
    public function __construct(
        ChainRouterInterface $chainRouter,
        RequestResourceFilterPluginInterface $requestResourceFilterPlugin
    ) {
        $this->chainRouter = $chainRouter;
        $this->requestResourceFilterPlugin = $requestResourceFilterPlugin;
    }

    /**
     * @param \Generated\Shared\Transfer\GlueRequestTransfer $glueRequestTransfer
     * @param array<\Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceInterface> $resources
     *
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceInterface
     */
    public function matchRequest(GlueRequestTransfer $glueRequestTransfer, array $resources): ResourceInterface
    {
        $glueRequestTransfer = $this->chainRouter->routeResource($glueRequestTransfer);

        if (!$glueRequestTransfer->getResource()) {
            return new MissingResource(
                Response::HTTP_NOT_FOUND,
                'Route not found',
            );
        }

        if (
            !$glueRequestTransfer->getResource()->getResourceName() &&
            $glueRequestTransfer->getResource()->getController()
        ) {
            return new GenericResource($glueRequestTransfer->getResource()->getController());
        }

        $resource = $this->requestResourceFilterPlugin->filterResource($glueRequestTransfer, $resources);

        if (!$resource) {
            return new MissingResource(
                Response::HTTP_NOT_FOUND,
                'Route not found',
            );
        }

        return $resource;
    }
}
