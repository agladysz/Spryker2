<?php

namespace Pyz\Zed\Faq\Communication;
use Symfony\Component\Form\FormInterface;
use Generated\Shared\Transfer\FaqTransfer;
use Pyz\Zed\Faq\Communication\Form\FaqForm;
use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Pyz\Zed\Faq\FaqDependencyProvider;
use Pyz\Zed\Faq\Communication\Table\FaqTable;
use Pyz\Zed\Faq\Communication\Form\DeleteFaqForm;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException;

class FaqCommunicationFactory extends AbstractCommunicationFactory {
    /**  * @return \Pyz\Zed\Faq\Communication\Table\FaqTable
     * @throws \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException  */

    public function createFaqTable(): FaqTable {
        return new FaqTable($this->getFaqPropelQuery());
    }

    /**  * @return \Orm\Zed\Faq\Persistence\PyzFaqQuery
    * @throws \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException */

    private function getFaqPropelQuery(): PyzFaqQuery {
        return $this->getProvidedDependency(FaqDependencyProvider::QUERY_Faq);
    }

    // trait BundleDependencyProviderResolverAwareTrait
    public function getProvidedDependency($key)
    {
        $container = $this->getContainer();
        if($container->has($key) === false){
            throw new ContainerKeyNotFoundException($this,$key);
        }
        return $container->get($key);
    }

    /**
     * @param \Generated\Shared\Transfer\FaqTransfer|null $FaqTranfser
     * @param array $options
     *
     * @return \Symfony\Component\Form\FormInterface
     */

    public function createFaqForm(?FaqTransfer $FaqTransfer = null,
                                    array $options = []): FormInterface {
        return $this->getFormFactory()->create(
            FaqForm::class,
            $FaqTransfer,
            $options
        );

    }
    public function createDeleteFaqForm(?FaqTransfer $FaqTransfer = null,
                                  array $options = []): FormInterface {
        return $this->getFormFactory()->create(
            DeleteFaqForm::class,
            $FaqTransfer,
            $options
        );

    }


}
