<?php

namespace FondOfSpryker\Glue\CreditmemosRestApi\Processor\Mapper;

use Generated\Shared\Transfer\CreditmemoTransfer;
use Generated\Shared\Transfer\RestCreditmemosAttributesTransfer;

class CreditmemoResourceMapper implements CreditmemoResourceMapperInterface
{
    /**
     * @param \Generated\Shared\Transfer\RestCreditmemosAttributesTransfer $restCreditmemosAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\CreditmemoTransfer
     */
    public function mapCreditmemosAttributesToCreditmemoTransfer(RestCreditmemosAttributesTransfer $restCreditmemosAttributesTransfer): CreditmemoTransfer
    {
        return (new CreditmemoTransfer())->fromArray($restCreditmemosAttributesTransfer->toArray(), true);
    }

    /**
     * @param \Generated\Shared\Transfer\CreditmemoTransfer $creditmemoTransfer
     *
     * @return \Generated\Shared\Transfer\RestCreditmemosAttributesTransfer
     */
    public function mapCreditmemoTransferToRestCreditmemosAttributesTransfer(CreditmemoTransfer $creditmemoTransfer): RestCreditmemosAttributesTransfer
    {
        return (new RestCreditmemosAttributesTransfer())->fromArray($creditmemoTransfer->toArray(), true);
    }
}
