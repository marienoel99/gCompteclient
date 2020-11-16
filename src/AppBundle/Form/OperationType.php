<?php

namespace AppBundle\Form;

;

use AppBundle\Entity\schemaOperation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OperationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('montant')->add('dateOp', DateType::class, ['widget' => 'single_text'])
            ->add('typeValeur', ChoiceType::class,['choices'=>[
                'Dépot' => 'Depot',
                'Retrait' => 'retrait'],
                ])
            ->add('shemaOperation', EntityType::class,
                [
                    'label'=>'libeleSchema',
                    'class' => schemaOperation::class

                ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Operation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_operation';
    }


}
