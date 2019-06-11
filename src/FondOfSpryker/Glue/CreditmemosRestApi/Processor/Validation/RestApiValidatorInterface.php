<?php

namespace FondOfSpryker\Glue\CreditmemosRestApi\Processor\Validation;


use Generated\Shared\Transfer\CreditmemoResponseTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

interface RestApiValidatorInterface
{
    /**
     * @param \Generated\Shared\Transfer\CreditmemoResponseTransfer $creditmemoResponseTransfer
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface $restResponse
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function validateCreditmemoResponseTransfer(
        CreditmemoResponseTransfer $creditmemoResponseTransfer,
        RestRequestInterface $restRequest,
        RestResponseInterface $restResponse
    ): RestResponseInterface;

}
