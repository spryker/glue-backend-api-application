<?php

/**
* Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
* Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
*/

namespace Spryker\Glue\GlueBackendApiApplication;

use Spryker\Glue\Kernel\Backend\Container;
use Spryker\Glue\Kernel\Backend\Factory\AbstractFactory;

class GlueBackendApiApplicationFactory extends AbstractFactory
{
    /**
     * @return Container
     */
    public function getDependencyContainer(): Container
    {
        return $this->getContainer();
    }
}
