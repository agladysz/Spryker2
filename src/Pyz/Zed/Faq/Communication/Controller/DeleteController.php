<?php
namespace Pyz\Zed\Faq\Communication\Controller;

use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use function PHPUnit\Framework\isNull;

/**
 * @method \Pyz\Zed\Faq\Communication\FaqCommunicationFactory getFactory()
 */

class DeleteController extends AbstractController
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */

    public function indexAction(Request $request)
    {
        $idFaq = $this->castId($request->query->get('id-faq'));
        $Faq = $this->getFacade()
                ->findFaqById($idFaq);
        if(is_null($Faq)){
            $this->addErrorMessage('Faq with given id not exists.');
            return $this->redirectResponse('/faq/list');
        }
        $FaqTransfer = (new FaqTransfer())
            ->setIdFaq($idFaq);

        $DeleteFaqForm = $this->getFactory()
            ->createDeleteFaqForm($FaqTransfer)
            ->handleRequest($request);

        if ($DeleteFaqForm->isSubmitted() && $DeleteFaqForm->isValid()) {
            $this->getFacade()
                ->removeFaq($DeleteFaqForm->getData());
            $this->addSuccessMessage('Faq was deleted.');

            return $this->redirectResponse('/faq/list');
        }

        return $this->viewResponse([
            'DeleteFaqForm' => $DeleteFaqForm->createView()
        ]);
    }

}
