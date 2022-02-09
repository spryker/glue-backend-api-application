<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Shared\GlueBackendApiApplication;

use Spryker\Shared\Kernel\AbstractSharedConfig;

class GlueBackendApiApplicationConfig extends AbstractSharedConfig
{
    /**
     * Specification:
     * - Defines the default path to the Router cache files.
     *
     * @api
     *
     * @return string
     */
    public function getDefaultRouterCachePath(): string
    {
        $projectNamespaces = implode('/', $this->get(GlueBackendApiApplicationConstants::PROJECT_NAMESPACES));

        return sprintf(
            '%s/src/Generated/%s/Router/codeBucket%s/%s',
            APPLICATION_ROOT_DIR,
            ucfirst(strtolower(APPLICATION)),
            APPLICATION_CODE_BUCKET,
            $projectNamespaces,
        );
    }
}
