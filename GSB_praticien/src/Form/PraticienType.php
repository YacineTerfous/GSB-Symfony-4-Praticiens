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
            ->add('pra_num',IntegerType::class,[
                'label' => "num",
                'attr'  =>[
                    'placeholder'=>"Saisir le numero du praticien"
                ]
            ])

            ->add('pra_nom',IntegerType::class,[
                'label' => "nom",
                'attr'  =>[
                    'placeholder'=>"Saisir le nom du praticien"
                ]
            ])

            ->add('pra_adr',IntegerType::class,[
                'label' => "adresse",
                'attr'  =>[
                    'placeholder'=>"Saisir l'adresse du praticien"
                ]
            ])

            ->add('pra_CP',IntegerType::class,[
                'label' => "CodePostal",
                'attr'  =>[
                    'placeholder'=>"Saisir le code postal du praticien"
                ]
            ])

            ->add('pra_ville',IntegerType::class,[
                'label' => "ville",
                'attr'  =>[
                    'placeholder'=>"Saisir la ville du praticien"
                ]
            ])

            ->add('pra_coefnotoriete',PercentType::class,[
                'label' => "Coefficient",
                'attr'  =>[
                    'placeholder'=>"Saisir le coefficient du praticien"
                ]
            ])

            ->add('avatar',UrlType::class,[
                'label' => "avatar",
                'attr'  =>[
                    'placeholder'=>"Inserez l'avatar du praticien"
                ]
            ])

            ->add('Type_code',IntegerType::class,[
                'label' => "code",
                'attr'  =>[
                    'placeholder'=>"Saisir le code du praticien"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => praticien::class,
        ]);
    }
}
