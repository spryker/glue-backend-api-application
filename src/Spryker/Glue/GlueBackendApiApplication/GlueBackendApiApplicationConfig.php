<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\GlueBackendApiApplication;

use Spryker\Glue\GlueBackendApiApplication\Router\Generator\UrlGenerator;
use Spryker\Glue\GlueBackendApiApplication\Router\UrlMatcher\CompiledUrlMatcher;
use Spryker\Glue\Kernel\AbstractBundleConfig;
use Spryker\Shared\GlueBackendApiApplication\GlueBackendApiApplicationConstants;

class GlueBackendApiApplicationConfig extends AbstractBundleConfig
{
    /**
     * @var string
     */
    protected const HEADER_X_FRAME_OPTIONS_VALUE = 'SAMEORIGIN';

    /**
     * @var string
     */
    protected const HEADER_CONTENT_SECURITY_POLICY_VALUE = 'frame-ancestors \'self\'';

    /**
     * @var string
     */
    protected const HEADER_X_CONTENT_TYPE_OPTIONS_VALUE = 'nosniff';

    /**
     * @var string
     */
    protected const HEADER_X_XSS_PROTECTION_VALUE = '1; mode=block';

    /**
     * @var string
     */
    protected const HEADER_REFERRER_POLICY_VALUE = 'same-origin';

    /**
     * @var string
     */
    protected const HEADER_PERMISSIONS_POLICY_VALUE = '';

    /**
     * Specification:
     * - Returns the host that the Backend API application serves
     *
     * @api
     *
     * @return string
     */
    public function getBackendApiApplicationHost(): string
    {
        return $this->get(GlueBackendApiApplicationConstants::GLUE_BACKEND_API_HOST, '');
    }

    /**
     * Specification:
     * - Configures if api application should output debug statements
     *
     * @api
     *
     * @return bool
     */
    public function isDebugModeEnabled(): bool
    {
        return (bool)$this->get(
            GlueBackendApiApplicationConstants::ENABLE_APPLICATION_DEBUG,
            false,
        );
    }

    /**
     * @api
     *
     * @return array<string, string>
     */
    public function getSecurityHeaders(): array
    {
        return [
            'X-Frame-Options' => static::HEADER_X_FRAME_OPTIONS_VALUE,
            'Content-Security-Policy' => static::HEADER_CONTENT_SECURITY_POLICY_VALUE,
            'X-Content-Type-Options' => static::HEADER_X_CONTENT_TYPE_OPTIONS_VALUE,
            'X-XSS-Protection' => static::HEADER_X_XSS_PROTECTION_VALUE,
            'Referrer-Policy' => static::HEADER_REFERRER_POLICY_VALUE,
            'Permissions-policy' => static::HEADER_PERMISSIONS_POLICY_VALUE,
        ];
    }

    /**
     * Specification:
     * - Returns a Router configuration which makes use of a Router cache.
     *
     * @api
     *
     * @see \Symfony\Component\Routing\Router::setOptions()
     *
     * @return array<string, mixed>
     */
    public function getRouterConfiguration(): array
    {
        return [
            'cache_dir' => $this->getCachePathIfCacheEnabled(),
            'generator_class' => UrlGenerator::class,
            'matcher_class' => CompiledUrlMatcher::class,
        ];
    }

    /**
     * @return string|null
     */
    protected function getCachePathIfCacheEnabled(): ?string
    {
        if ($this->get(GlueBackendApiApplicationConstants::GLUE_IS_CACHE_ENABLED, true)) {
            return $this->get(GlueBackendApiApplicationConstants::GLUE_CACHE_PATH, $this->getSharedConfig()->getDefaultRouterCachePath());
        }

        return null;
    }
}
