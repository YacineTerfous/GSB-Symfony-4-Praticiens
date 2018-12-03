<?php

namespace App\Form;

use App\Entity\Praticien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PraticienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Pra_num',IntegerType::class,[
                'label' => "num",
                'attr'  =>[
                    'placeholder'=>"Saisir le numero du Praticien"
                ]
            ])

            ->add('Pra_nom',IntegerType::class,[
                'label' => "nom",
                'attr'  =>[
                    'placeholder'=>"Saisir le nom du Praticien"
                ]
            ])

            ->add('Pra_adr',IntegerType::class,[
                'label' => "adresse",
                'attr'  =>[
                    'placeholder'=>"Saisir l'adresse du Praticien"
                ]
            ])

            ->add('Pra_CP',IntegerType::class,[
                'label' => "CodePostal",
                'attr'  =>[
                    'placeholder'=>"Saisir le code postal du Praticien"
                ]
            ])

            ->add('Pra_ville',IntegerType::class,[
                'label' => "ville",
                'attr'  =>[
                    'placeholder'=>"Saisir la ville du Praticien"
                ]
            ])

            ->add('Pra_coefnotoriete',PercentType::class,[
                'label' => "Coefficient",
                'attr'  =>[
                    'placeholder'=>"Saisir le coefficient du Praticien"
                ]
            ])

            ->add('avatar',UrlType::class,[
                'label' => "avatar",
                'attr'  =>[
                    'placeholder'=>"Inserez l'avatar du Praticien"
                ]
            ])

            ->add('Type_code',IntegerType::class,[
                'label' => "code",
                'attr'  =>[
                    'placeholder'=>"Saisir le code du Praticien"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Praticien::class,
        ]);
    }
}
