<?php
declare(strict_types=1);


namespace App\Forms;


use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SignUpType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'help' => 'Alphanumeric characters only'
            ])
            ->add('fullname', TextType::class, [
                'required' => false,
                'help' => 'How you want us to address you'
            ])
            ->add('email', EmailType::class, [
                'required' => false,
                'help' => 'We\'ll never share your email with anyone else'
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'required' => true,
                'invalid_message' => 'The passwords have to match',
                'first_options' => [
                    'label' => 'Password',
                    'help' => 'More than 5 characters, please'
                ],
                'second_options' => [
                    'label' => 'Re-enter password',
                    'help' => 'Passwords have to match'
                ]
            ])
            ->add('submit', SubmitType::class, ['label' => 'Sign up']);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => User::class]);
    }
}