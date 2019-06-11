<?php

namespace FondOfSpryker\Glue\CreditmemosRestApi\Dependency\Client;

use FondOfSpryker\Glue\CreditmemosRestApi\Dependency\Client\CreditmemosRestApiToCreditmemoClientInterface;
use Generated\Shared\Transfer\CreditmemoListTransfer;
use Generated\Shared\Transfer\CreditmemoResponseTransfer;
use Generated\Shared\Transfer\CreditmemoTransfer;

class CreditmemosRestApiToCreditmemoClientBridge implements CreditmemosRestApiToCreditmemoClientInterface
{

    protected $creditmemoClient;

    /**
     * CreditmemosRestApiToCreditmemoClientBridge constructor.
     *
     * @param \FondOfSpryker\Client\Cr$creditmemoClient
     */
    public function __construct($creditmemoClient)
    {
        $this->creditmemoClient = $creditmemoClient;
    }

    /**
     * @param \Generated\Shared\Transfer\CreditmemoListTransfer $creditmemoListTransfer
     *
     * @return \Generated\Shared\Transfer\CreditmemoListTransfer
     */
    public function findCreditmemosByOrderReference(CreditmemoListTransfer $creditmemoListTransfer): CreditmemoListTransfer
    {
        return $this->creditmemoClient->findCreditmemosByOrderReference($creditmemoListTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\CreditmemoTransfer $creditmemoTransfer
     *
     * @return \Generated\Shared\Transfer\CreditmemoResponseTransfer
     */
    public function createCreditmemo(CreditmemoTransfer $creditmemoTransfer): CreditmemoResponseTransfer
    {
        return $this->creditmemoClient->createCreditmemo($creditmemoTransfer);
    }

}
