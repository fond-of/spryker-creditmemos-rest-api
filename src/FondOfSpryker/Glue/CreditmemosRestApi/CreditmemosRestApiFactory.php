<?php

namespace FondOfSpryker\Glue\CreditmemosRestApi;

use FondOfSpryker\Glue\CreditmemosRestApi\Dependency\Client\CreditmemosRestApiToCreditmemoClientInterface;
use FondOfSpryker\Glue\CreditmemosRestApi\Processor\Creditmemo\CreditmemoReader;
use FondOfSpryker\Glue\CreditmemosRestApi\Processor\Creditmemo\CreditmemoReaderInterface;
use FondOfSpryker\Glue\CreditmemosRestApi\Processor\Creditmemo\CreditmemoWriter;
use FondOfSpryker\Glue\CreditmemosRestApi\Processor\Mapper\CreditmemoResourceMapper;
use FondOfSpryker\Glue\CreditmemosRestApi\Processor\Mapper\CreditmemoResourceMapperInterface;
use FondOfSpryker\Glue\CreditmemosRestApi\Processor\Validation\RestApiError;
use FondOfSpryker\Glue\CreditmemosRestApi\Processor\Validation\RestApiErrorInterface;
use FondOfSpryker\Glue\CreditmemosRestApi\Processor\Validation\RestApiValidator;
use FondOfSpryker\Glue\CreditmemosRestApi\Processor\Validation\RestApiValidatorInterface;
use Spryker\Glue\Kernel\AbstractFactory;

class CreditmemosRestApiFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Glue\CreditmemosRestApi\Processor\Creditmemo\CreditmemoReaderInterface
     *
     * @throws \Spryker\Glue\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function createCreditmemoReader(): CreditmemoReaderInterface
    {
        return new CreditmemoReader(
            $this->getCreditmemoClient(),
            $this->createCreditmemoResourceMapper(),
            $this->getResourceBuilder(),
            $this->createRestApiError(),
            $this->createRestApiValidator()
        );
    }

    /**
     * @return \FondOfSpryker\Glue\CreditmemosRestApi\Processor\Creditmemo\CreditmemoWriter
     *
     * @throws \Spryker\Glue\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function createCreditmemoWriter(): CreditmemoWriter
    {
        return new CreditmemoWriter(
            $this->getCreditmemoClient(),
            $this->createCreditmemoReader(),
            $this->getResourceBuilder(),
            $this->createCreditmemoResourceMapper(),
            $this->createRestApiError(),
            $this->createRestApiValidator()
        );
    }

    /**
     * @return \FondOfSpryker\Glue\CreditmemosRestApi\Dependency\Client\CreditmemosRestApiToCreditmemoClientInterface
     *
     * @throws \Spryker\Glue\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function getCreditmemoClient(): CreditmemosRestApiToCreditmemoClientInterface
    {
        return $this->getProvidedDependency(CreditmemosRestApiDependencyProvider::CLIENT_CREDITMEMO);
    }

    /**
     * @return \FondOfSpryker\Glue\CreditmemosRestApi\Processor\Mapper\CreditmemoResourceMapperInterface
     */
    public function createCreditmemoResourceMapper(): CreditmemoResourceMapperInterface
    {
        return new CreditmemoResourceMapper();
    }

    /**
     * @return \FondOfSpryker\Glue\CreditmemosRestApi\Processor\Validation\RestApiValidatorInterface
     */
    public function createRestApiValidator(): RestApiValidatorInterface
    {
        return new RestApiValidator($this->createRestApiError());
    }

    /**
     * @return \FondOfSpryker\Glue\CreditmemosRestApi\Processor\Validation\RestApiErrorInterface
     */
    public function createRestApiError(): RestApiErrorInterface
    {
        return new RestApiError();
    }
}
