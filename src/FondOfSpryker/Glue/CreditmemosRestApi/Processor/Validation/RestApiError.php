<?php

namespace FondOfSpryker\Glue\CreditmemosRestApi\Processor\Validation;

use FondOfSpryker\Glue\CreditmemosRestApi\CreditmemosRestApiConfig;
use Generated\Shared\Transfer\CreditmemoResponseTransfer;
use Generated\Shared\Transfer\RestErrorMessageTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Symfony\Component\HttpFoundation\Response;

class RestApiError implements RestApiErrorInterface
{
    /**
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface $restResponse
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function addCreditmemoNotFoundError(RestResponseInterface $restResponse): RestResponseInterface
    {
        $restErrorMessageTransfer = (new RestErrorMessageTransfer())
            ->setCode(CreditmemosRestApiConfig::RESPONSE_CODE_CREDITMEMO_NOT_FOUND)
            ->setStatus(Response::HTTP_NOT_FOUND)
            ->setDetail(CreditmemosRestApiConfig::RESPONSE_DETAILS_CREDITMEMO_NOT_FOUND);

        return $restResponse->addError($restErrorMessageTransfer);
    }
}
