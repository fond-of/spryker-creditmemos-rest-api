<?php

namespace FondOfSpryker\Glue\CreditmemosRestApi\Plugin\ResourceRoute;

use FondOfSpryker\Glue\CreditmemosRestApi\CreditmemosRestApiConfig;
use Generated\Shared\Transfer\RestCreditmemosAttributesTransfer;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRoutePluginInterface;
use Spryker\Glue\Kernel\AbstractPlugin;

/**
 * @method \FondOfSpryker\Glue\CreditmemosRestApi\CreditmemosRestApiFactory getFactory()
 */
class CreditmemosResourceRoutePlugin extends AbstractPlugin implements ResourceRoutePluginInterface
{
    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface $resourceRouteCollection
     *
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface
     */
    public function configure(ResourceRouteCollectionInterface $resourceRouteCollection): ResourceRouteCollectionInterface
    {
        $resourceRouteCollection
            ->addGet(CreditmemosRestApiConfig::ACTION_CREDITMEMOS_GET)
            ->addPost(CreditmemosRestApiConfig::ACTION_CREDITMEMOS_POST)
            ->addPatch(CreditmemosRestApiConfig::ACTION_CREDITMEMO_ITEMS_PATCH);

        return $resourceRouteCollection;
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @return string
     */
    public function getResourceType(): string
    {
        return CreditmemosRestApiConfig::RESOURCE_CREDITMEMOS;
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @return string
     */
    public function getController(): string
    {
        return CreditmemosRestApiConfig::CONTROLLER_CREDITMEMOS;
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @return string
     */
    public function getResourceAttributesClassName(): string
    {
        return RestCreditmemosAttributesTransfer::class;
    }
}
