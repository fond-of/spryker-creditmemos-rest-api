<?php

namespace FondOfSpryker\Glue\CreditmemosRestApi\Processor\Validation;

use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Generated\Shared\Transfer\CreditmemoResponseTransfer;

interface RestApiErrorInterface
{
    /**
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface $restResponse
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function addCreditmemoNotFoundError(RestResponseInterface $restResponse): RestResponseInterface;
    
}
