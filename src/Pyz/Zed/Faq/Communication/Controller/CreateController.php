<?php

namespace Pyz\Zed\Faq\Communication\Controller;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Zed\Faq\Communication\FaqCommunicationFactory getFactory()
 * @method \Pyz\Zed\Faq\Business\FaqFacadeInterface getFacade()
 */
class CreateController extends AbstractController
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $FaqForm = $this->getFactory()
            ->createFaqForm()
            ->handleRequest($request);

        if ($FaqForm->isSubmitted() && $FaqForm->isValid()) {
            $this->getFacade()
                ->saveFaq($FaqForm->getData());
            $this->addSuccessMessage('Faq was created.');

            return $this->redirectResponse('/faq/list');
        }

        return $this->viewResponse([
            'FaqForm' => $FaqForm->createView()
        ]);
    }
}
