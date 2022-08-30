<?php

namespace Pyz\Zed\Faq\Communication\Form;
use Spryker\Zed\Kernel\Communication\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Generated\Shared\Transfer\FaqTransfer;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class FaqForm extends AbstractType {
    private const FIELD_QUESTION = 'question';
    private const FIELD_ACTIVATED = 'activated';
    private const FIELD_ANSWER = 'answer';
    private const BUTTON_SUBMIT = 'button_submit';

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'Faq';
    }

    /**
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver
     */

    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults([
            'data_class' => FaqTransfer::class
        ]);
    }

    /* @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     * */

    public function buildForm(FormBuilderInterface $builder, array $options) : void
    {
        $this->addQuestionField($builder)->addAnswerField($builder)
        ->addActivated($builder)->addSubmitButton($builder);
    }

    /** @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @return $this
     */

    private function addQuestionField(FormBuilderInterface $builder): FaqForm{
        $builder->add(static::FIELD_QUESTION, TextType::class, [
            'constraints' => [
                new Length([
                    'max'=> 255
                ]),
                new NotBlank()
            ]
        ]);
        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
    */

    private function addAnswerField(FormBuilderInterface $builder): FaqForm{
        $builder->add(static::FIELD_ANSWER, TextType::class,
            [
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'max'=> 255
                    ])
                ]
            ]
        );
        return $this;
    }
    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */

    private function addActivated(FormBuilderInterface $builder): FaqForm{
        $builder->add(static::FIELD_ACTIVATED, TextType::class,
            [
                'constraints' => [
                    new NotBlank()
                ]
            ]
        );
        return $this;
    }


    private function addSubmitButton(FormBuilderInterface $builder): FaqForm{
        $builder->add(static::BUTTON_SUBMIT, SubmitType::class);
        return $this;
    }

}
