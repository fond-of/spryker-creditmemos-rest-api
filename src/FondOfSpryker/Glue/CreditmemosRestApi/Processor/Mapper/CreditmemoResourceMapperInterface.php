<?php

namespace FondOfSpryker\Glue\CreditmemosRestApi\Processor\Mapper;

use Generated\Shared\Transfer\CreditmemoTransfer;
use Generated\Shared\Transfer\RestCreditmemosAttributesTransfer;

interface CreditmemoResourceMapperInterface
{
    /**
     * @param \Generated\Shared\Transfer\RestCreditmemosAttributesTransfer $restCreditmemosAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\CreditmemoTransfer
     */
    public function mapCreditmemosAttributesToCreditmemoTransfer(RestCreditmemosAttributesTransfer $restCreditmemosAttributesTransfer): CreditmemoTransfer;

    /**
     * @param \Generated\Shared\Transfer\CreditmemoTransfer $creditmemoTransfer
     *
     * @return \Generated\Shared\Transfer\RestCreditmemosAttributesTransfer
     */
    public function mapCreditmemoTransferToRestCreditmemosAttributesTransfer(CreditmemoTransfer $creditmemoTransfer): RestCreditmemosAttributesTransfer;
}
