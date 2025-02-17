<?php

namespace App\Form;

use App\Entity\Refrigerator;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RefrigeratorFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du frigo : ',
                'attr' => ['class' => 'input ml-1 bg-white border-gray-500 h-10'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer le nom du réfrigérateur.',
                    ]),
                    new Length([
                        'min' => 2,
                        'max' => 100,
                        'minMessage' => 'Le nom du réfrigérateur doit contenir au moins {{ limit }} caractères.',
                        'maxMessage' => 'Le nom du réfrigérateur ne peut pas dépasser {{ limit }} caractères.',
                    ]),
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Créer',
                'attr' => ['class' => 'btn btn-primary text-white mt-5 w-52']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Refrigerator::class,
        ]);
    }
}
