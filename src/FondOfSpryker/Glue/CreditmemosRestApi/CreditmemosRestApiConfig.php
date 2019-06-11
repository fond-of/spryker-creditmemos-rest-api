<?php

namespace FondOfSpryker\Glue\CreditmemosRestApi;

use Spryker\Glue\Kernel\AbstractBundleConfig;

class CreditmemosRestApiConfig extends AbstractBundleConfig
{
    public const RESOURCE_CREDITMEMOS = 'creditmemos';

    public const CONTROLLER_CREDITMEMOS = 'creditmemos-resource';
    public const CONTROLLER_CREDITMEMO_ITEMS = 'creditmemo-items-resource';

    public const ACTION_CREDITMEMOS_GET = 'get';
    public const ACTION_CREDITMEMOS_POST = 'post';

    public const ACTION_CREDITMEMO_ITEMS_POST = 'post';
    public const ACTION_CREDITMEMO_ITEMS_PATCH = 'patch';

    public const RESPONSE_CODE_ITEM_VALIDATION = '102';
    public const RESPONSE_CODE_ITEM_NOT_FOUND = '103';
    public const RESPONSE_CODE_CREDITMEMO_ID_MISSING = '104';
    public const RESPONSE_CODE_FAILED_CREATING_CREDITMEMO = '107';

    public const EXCEPTION_MESSAGE_CREDITMEMO_ID_MISSING = 'Creditmemo uuid is missing.';
    public const EXCEPTION_MESSAGE_FAILED_TO_CREATE_CREDITMEMO = 'Failed to create creditmemo.';
    public const EXCEPTION_MESSAGE_CREDITMEMO_WITH_ID_NOT_FOUND = 'Creditmemo with given uuid not found.';
    
    public const REST_RESOURCE_ATTRIBUTE_ORDER_REFERENCE = "orderReference";
    public const REST_RESOURCE_ATTRIBUTE_CUSTOMER_REFERENCE = "customerReference";

    public const RESPONSE_CODE_CREDITMEMO_NOT_FOUND = '101';
    public const RESPONSE_DETAILS_CREDITMEMO_NOT_FOUND = 'Creditmemo not found.';

    public const QUERY_STRING_PARAMETER_ORDER_REFERENCE = 'order_reference';




    
}
