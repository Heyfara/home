<?php

namespace App\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;       

/**
 * Encode user password right before the object is saved
 * in database             
 */
class PasswordEncodeSubscriber implements EventSubscriber
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function getSubscribedEvents()
    {
        return array(      
            'prePersist',  
            'preUpdate',   
        );                 
    }

    public function preUpdate(LifecycleEventArgs $args)
    {
        $this->encodePassword($args);   
    }                      

    public function prePersist(LifecycleEventArgs $args)
    {                      
        $this->encodePassword($args);   
    }

    public function encodePassword(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();   

        if ($entity instanceof User) {  

            if (!$entity->getPlainPassword()) {
                return;
            }

            $encoded = $this->passwordEncoder->encodePassword(
                $entity,
                $entity->getPlainPassword()     
            );
            $entity->setPassword($encoded); 
        }
    }
}
