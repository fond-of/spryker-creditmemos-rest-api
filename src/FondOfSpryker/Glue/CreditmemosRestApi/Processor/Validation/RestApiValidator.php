<?php

namespace FondOfSpryker\Glue\CreditmemosRestApi\Processor\Validation;

use Generated\Shared\Transfer\CreditmemoResponseTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

class RestApiValidator implements RestApiValidatorInterface
{
    /**
     * @var \FondOfSpryker\Glue\CreditmemosRestApi\Processor\Validation\RestApiErrorInterface
     */
    protected $apiErrors;

    /**
     * RestApiValidator constructor.
     *
     * @param \FondOfSpryker\Glue\CreditmemosRestApi\Processor\Validation\RestApiErrorInterface $apiErrors
     */
    public function __construct(RestApiErrorInterface $apiErrors)
    {
        $this->apiErrors = $apiErrors;
    }
}
