<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    public const REFERENCE = 'user-reference';
    
    /** @var UserPasswordEncoderInterface */
    private $passwordEncoder;

    /**
     * UserFixtures constructor.
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $user = new User();
            if ($i === 0) {
                $user->setUsername('admin');
                $user->setEmail('admin@fake.mail');
                $user->setRoles('ROLE_ADMIN');
            } else {
                $user->setUsername('user' . $i);
                $user->setEmail("user{$i}@fake.mail");
            }
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user, 'admin'
            ));
            $manager->persist($user);

            $this->addReference(self::REFERENCE . '-' . $i, $user);
        }
        $manager->flush();
    }
}
