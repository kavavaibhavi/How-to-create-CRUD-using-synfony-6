<?php

namespace App\Form;

use App\Entity\Student;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('first')
            ->add('last_name')
            ->add('gender',ChoiceType::class,[
                'choices' => [
                    'Male' => 'Male',
                    'Female' => 'Female',
                ],
                'multiple' => false,
                'expanded' => true
            ])
            ->add('city', ChoiceType::class,[
                'choices' => [
                    'Select your city' => 'Select your City',
                    'Ahmedabad' => 'Ahmedabad',
                    'Bhavnagar' => 'Bhavnagar',
                    'Surat' => 'Surat',
                ],
            ])
            ->add('stream',ChoiceType::class,[
                'choices' => [
                    'science' => 'Science',
                    'commerce' => 'Commerce',
                    'arts' => 'Arts',
                ],
                'multiple' => true,
                'expanded' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Student::class,
        ]);
    }
}
