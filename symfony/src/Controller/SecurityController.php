<?php

namespace App\Controller;

use App\Entity\User;
use App\Forms\SignUpType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/sign/in", name="app_sign_in")
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function in(AuthenticationUtils $authenticationUtils): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_ANONYMOUSLY');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/in.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    /**
     * @Route("/sign/up", name="app_sign_up")
     * @param EntityManagerInterface $em
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function up(EntityManagerInterface $em, UserPasswordEncoderInterface $passwordEncoder, Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(SignUpType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $password = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);

            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'You were successfully signed up! You can sign in now.');
            return $this->redirectToRoute('app_sign_in');
        }
        return $this->render('security/up.html.twig', [
            'controller_name' => 'SignController',
            'signUpForm' => $form->createView()
        ]);
    }
}
