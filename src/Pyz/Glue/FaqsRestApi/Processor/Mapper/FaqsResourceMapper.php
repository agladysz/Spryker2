<?php

namespace Pyz\Glue\FaqsRestApi\Processor\Mapper;

use Generated\Shared\Transfer\RestFaqsResponseAttributesTransfer;

class FaqsResourceMapper implements FaqsResourceMapperInterface {
    public function mapFaqDataToFaqRestAttributes(array $faqData): RestFaqsResponseAttributesTransfer
    {
        $restFaqsAttributesTransfer = (new RestFaqsResponseAttributesTransfer())
            -> fromArray($faqData, true);
        return $restFaqsAttributesTransfer;
    }
}
