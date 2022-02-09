<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\GlueBackendApiApplication\Router;

use Generated\Shared\Transfer\GlueRequestTransfer;
use Symfony\Cmf\Component\Routing\ChainRouterInterface as SymfonyChainRouterInterface;

interface ChainRouterInterface extends SymfonyChainRouterInterface
{
    /**
     * @param \Generated\Shared\Transfer\GlueRequestTransfer $glueRequestTransfer
     *
     * @return \Generated\Shared\Transfer\GlueRequestTransfer
     */
    public function routeResource(GlueRequestTransfer $glueRequestTransfer): GlueRequestTransfer;
}