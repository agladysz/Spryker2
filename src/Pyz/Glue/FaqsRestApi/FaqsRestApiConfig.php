<?php

namespace Pyz\Glue\FaqsRestApi;

use Spryker\Glue\Kernel\AbstractBundleConfig;

class FaqsRestApiConfig extends AbstractBundleConfig
{
    public const RESOURCE_FAQS = 'faqs';

    public const RESPONSE_CODE_FAQS_NOT_FOUND = '101';
    public const RESPONSE_CODE_FAQS_VALIDATION = '102';
}
