<?php

namespace Pyz\Yves\FaqsRestApi\Controller;

use Exception;
use Generated\Shared\Transfer\FaqCollectionTransfer;
use Spryker\Yves\Kernel\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Client\FaqsRestApi\FaqsRestApiClient getClient()
 */
class IndexController extends AbstractController
{
    /**
     * @param Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Spryker\Yves\Kernel\View\View
     */
    public function indexAction(Request $request)
    {
        $faqCollectionTransfer = new FaqCollectionTransfer();
        try {
            $faqCollectionTransfer = $this->getClient()->getFaqCollection($faqCollectionTransfer);
            $faqs = $this->readArray($faqCollectionTransfer);
        } catch (Exception $e) {

        }
        $data = ['faqs' => $faqs];

        return $this->view(
            $data,
            [],
            '@FaqsRestApi/views/index/index.twig'
        );
    }

    public function readArray(FaqCollectionTransfer $faqCollectionTransfer){
        $faqs = array();
        $faqCollectionTransfer = $faqCollectionTransfer->getFaqs();

        foreach($faqCollectionTransfer as $faq)
        {
            if( $faq->getActivated() != false || $faq->getActivated() != 0) {
                $farray = array(
                    'question' => $faq->getQuestion(),
                    'answer' => $faq->getAnswer(),
                    'votes' => $faq->getVotesCounter()
                );
                array_push($faqs, $farray);
            }
        }
        return $faqs;
    }
}
