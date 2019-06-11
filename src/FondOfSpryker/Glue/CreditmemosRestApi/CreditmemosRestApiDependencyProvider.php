<?php

namespace FondOfSpryker\Glue\CreditmemosRestApi;

use FondOfSpryker\Glue\CreditmemosRestApi\Dependency\Client\CreditmemosRestApiToCreditmemoClientBridge;
use Spryker\Glue\Kernel\AbstractBundleDependencyProvider;
use Spryker\Glue\Kernel\Container;

/**
 * @method \Spryker\Glue\CreditmemosRestApi\CreditmemosRestApiConfig getConfig()
 */
class CreditmemosRestApiDependencyProvider extends AbstractBundleDependencyProvider
{
    public const CLIENT_CREDITMEMO = 'CLIENT_CREDITMEMO';

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    public function provideDependencies(Container $container): Container
    {
        $container = parent::provideDependencies($container);

        $container = $this->addCreditmemoClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    protected function addCreditmemoClient(Container $container): Container
    {
        $container[static::CLIENT_CREDITMEMO] = function (Container $container) {
            return new CreditmemosRestApiToCreditmemoClientBridge($container->getLocator()->creditmemo()->client());
        };

        return $container;
    }

}
