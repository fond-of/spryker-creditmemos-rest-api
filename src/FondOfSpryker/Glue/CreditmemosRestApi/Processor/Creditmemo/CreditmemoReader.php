<?php

namespace FondOfSpryker\Glue\CreditmemosRestApi\Processor\Creditmemo;

use FondOfSpryker\Glue\CreditmemosRestApi\CreditmemosRestApiConfig;
use FondOfSpryker\Glue\CreditmemosRestApi\Dependency\Client\CreditmemosRestApiToCreditmemoClientInterface;
use FondOfSpryker\Glue\CreditmemosRestApi\Processor\Creditmemo\CreditmemoReaderInterface;
use FondOfSpryker\Glue\CreditmemosRestApi\Processor\Mapper\CreditmemoResourceMapperInterface;
use FondOfSpryker\Glue\CreditmemosRestApi\Processor\Validation\RestApiErrorInterface;
use FondOfSpryker\Glue\CreditmemosRestApi\Processor\Validation\RestApiValidatorInterface;
use Generated\Shared\Transfer\CreditmemoListTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;


class CreditmemoReader implements CreditmemoReaderInterface
{
    /**
     * @var \FondOfSpryker\Glue\CreditmemosRestApi\Dependency\Client\CreditmemosRestApiToCreditmemoClientInterface
     */
    protected $creditmemoClient;

    /**
     * @var \FondOfSpryker\Glue\CreditmemosRestApi\Processor\Mapper\CreditmemoResourceMapperInterface
     */
    protected $creditmemoResourceMapper;

    /**
     * @var \FondOfSpryker\Glue\CreditmemosRestApi\Processor\Validation\RestApiErrorInterface
     */
    protected $restApiError;

    /**
     * @var \FondOfSpryker\Glue\CreditmemosRestApi\Processor\Validation\RestApiValidatorInterface
     */
    protected $restApiValidator;

    /**
     * @var \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface
     */
    protected $restResourceBuilder;

    /**
     * CreditmemoReader constructor.
     *
     * @param \FondOfSpryker\Glue\CreditmemosRestApi\Dependency\Client\CreditmemosRestApiToCreditmemoClientInterface $creditmemoClient
     * @param \FondOfSpryker\Glue\CreditmemosRestApi\Processor\Mapper\CreditmemoResourceMapperInterface $creditmemoResourceMapper
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface $restResourceBuilder
     * @param \FondOfSpryker\Glue\CreditmemosRestApi\Processor\Validation\RestApiErrorInterface $restApiError
     * @param \FondOfSpryker\Glue\CreditmemosRestApi\Processor\Validation\RestApiValidatorInterface $restApiValidator
     */
    public function __construct(
        CreditmemosRestApiToCreditmemoClientInterface $creditmemoClient,
        CreditmemoResourceMapperInterface $creditmemoResourceMapper,
        RestResourceBuilderInterface $restResourceBuilder,
        RestApiErrorInterface $restApiError,
        RestApiValidatorInterface $restApiValidator
    ) {

        $this->creditmemoClient = $creditmemoClient;
        $this->creditmemoResourceMapper = $creditmemoResourceMapper;
        $this->restApiError = $restApiError;
        $this->restApiValidator = $restApiValidator;
        $this->restResourceBuilder = $restResourceBuilder;

    }

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     *
     * @throws
     */
    public function getCreditmemoAttributes(RestRequestInterface $restRequest): RestResponseInterface
    {
        $corderReference = $this->getRequestParameter($restRequest, CreditmemosRestApiConfig::QUERY_STRING_PARAMETER_ORDER_REFERENCE);
        $restResponse = $this->restResourceBuilder->createRestResponse();

        return $this->findCreditmemoListAttributesByOrderReference($restRequest, $corderReference);
    }

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     * @param string $parameterName
     *
     * @return string
     */
    protected function getRequestParameter(RestRequestInterface $restRequest, string $parameterName): string
    {
        return $restRequest->getHttpRequest()->query->get($parameterName, '');
    }

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     * @param string $orderReference
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    protected function findCreditmemoListAttributesByOrderReference(RestRequestInterface $restRequest, string $orderReference): RestResponseInterface
    {
        $creditmemoListTransfer = (new CreditmemoListTransfer())->setOrderReference($orderReference);
        $creditmemoListTransfer = $this->creditmemoClient->findCreditmemosByOrderReference($creditmemoListTransfer);

        $response = $this
            ->restResourceBuilder
            ->createRestResponse();

        foreach ($creditmemoListTransfer->getItems() as $creditmemoTransfer) {
            $restCreditmemosAttributesTransfer = $this->creditmemoResourceMapper->mapCreditmemoTransferToRestCreditmemosAttributesTransfer($creditmemoTransfer);
            
            $response = $response->addResource(
                $this->restResourceBuilder->createRestResource(
                    CreditmemosRestApiConfig::RESOURCE_CREDITMEMOS,
                    $creditmemoTransfer->getIdCreditmemo(),
                    $restCreditmemosAttributesTransfer
                )
            );
        }
        
        return $response;
    }
}
