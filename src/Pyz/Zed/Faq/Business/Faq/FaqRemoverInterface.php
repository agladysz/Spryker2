<?php

namespace Pyz\Zed\Faq\Business\Faq;
use Generated\Shared\Transfer\FaqTransfer;

interface FaqRemoverInterface
{
    /**
     * @param \Generated\Shared\Transfer\FaqTransfer $FaqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    public function remove(FaqTransfer $FaqTransfer): FaqTransfer;
}

