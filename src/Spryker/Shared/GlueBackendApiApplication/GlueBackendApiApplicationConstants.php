<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Shared\GlueBackendApiApplication;

/**
 * Declares global environment configuration keys. Do not use it for other class constants.
 */
interface GlueBackendApiApplicationConstants
{
    /**
     * Specification:
     * - Enables/disables global setting for debug mode.
     * - Defaults to false.
     *
     * @api
     *
     * @var string
     */
    public const ENABLE_APPLICATION_DEBUG = 'GLUE_BACKEND_API_APPLICATION:ENABLE_APPLICATION_DEBUG';

    /**
     * Specification:
     * - Contains the host that the Backend API serves.
     *
     * @api
     *
     * @var string
     */
    public const GLUE_BACKEND_API_HOST = 'GLUE_BACKEND_API_APPLICATION:GLUE_BACKEND_API_HOST';

    /**
     * @uses \Spryker\Shared\Kernel\KernelConstants::PROJECT_NAMESPACES
     *
     * @var string
     */
    public const PROJECT_NAMESPACES = 'GLUE_BACKEND_API_APPLICATION:PROJECT_NAMESPACES';

    /**
     * Specification:
     * - If option set to true, the application will create a router cache on the first request of a route.
     * - Defaults to true.
     *
     * @api
     *
     * @var string
     */
    public const GLUE_IS_CACHE_ENABLED = 'GLUE_BACKEND_API_APPLICATION:GLUE_IS_CACHE_ENABLED';

    /**
     * Specification:
     * - Path to where the cache files should be written to.
     *
     * @api
     *
     * @var string
     */
    public const GLUE_CACHE_PATH = 'GLUE_BACKEND_API_APPLICATION:GLUE_CACHE_PATH';

    /**
     * Specification:
     *  - Specifies a URI that may access the resources.
     *
     * @api
     *
     * @var string
     */
    public const GLUE_BACKEND_CORS_ALLOW_ORIGIN = 'GLUE_BACKEND_API_APPLICATION:GLUE_BACKEND_CORS_ALLOW_ORIGIN';

    /**
     * Specification:
     *  - Specifies allowed HTTP methods for CORS requests.
     *  - Defaults to 'GET, POST, PUT, PATCH, DELETE, OPTIONS'.
     *
     * @api
     *
     * @var string
     */
    public const GLUE_BACKEND_CORS_ALLOW_METHODS = 'GLUE_BACKEND_API_APPLICATION:GLUE_BACKEND_CORS_ALLOW_METHODS';

    /**
     * Specification:
     *  - Specifies whether credentials are allowed in CORS requests.
     *  - Defaults to 'true'.
     *
     * @api
     *
     * @var string
     */
    public const GLUE_BACKEND_CORS_ALLOW_CREDENTIALS = 'GLUE_BACKEND_API_APPLICATION:GLUE_BACKEND_CORS_ALLOW_CREDENTIALS';

    /**
     * Specification:
     *  - Specifies how long the results of a preflight request can be cached.
     *  - Defaults to '86400' (24 hours).
     *
     * @api
     *
     * @var string
     */
    public const GLUE_BACKEND_CORS_MAX_AGE = 'GLUE_BACKEND_API_APPLICATION:GLUE_BACKEND_CORS_MAX_AGE';
}
