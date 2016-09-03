<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidatureType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom_entreprise', TextType::class)
            ->add('poste',TextType::class)
            ->add('adresse',TextType::class)
            ->add('ville',TextType::class)
            ->add('etat',ChoiceType::class, array(
                    'choices' => array(
                        'Attente' => 'attente',
                        'Entretien' => 'entretien',
                        'Refus' => 'refus',
                        'Pas reponse' => 'pas de reponse',
                        'Confirme' => 'confirmé'
                )
            ))
            ->add('contact',TextType::class)
            ->add('email', EmailType::class)
            ->add('note',TextType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Candidature'
        ));
    }
}
