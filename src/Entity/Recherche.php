/*
Aller au contenu
Utiliser Gmail avec un lecteur d'écran
Activez les notifications de bureau pour Gmail.   OK  Non, merci
6 sur 1 392
Entity Users
Boîte de réception
	x
Georges Igor Palakot <ipalakot@guinot.asso.fr>
	
Pièces jointes10:24 (il y a 10 heures)
	
À kevin, lea124, marcel, abdelkrim, Georges, moi
*/

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;


/**
     * @ORM\Entity(repositoryClass="App\Repository\UsersRepository")
     * @UniqueEntity(fields={"username"}, message="There is already an account with this username")
     */
    class Users implements UserInterface
      {
          /**
           * @ORM\Id()
           * @ORM\GeneratedValue()
           * @ORM\Column(type="integer")
           */
          private $id;
      
          /**
           * @ORM\Column(type="string", length=255)
           */
          private $username;
      
          /**
           * @ORM\Column(type="string", length=255)
           */
          private $email;
      
          /**
           * @ORM\Column(type="string", length=255)
           */
          private $roles;
      
          /**
           * @ORM\Column(type="string", length=255)
           */
          private $password;
      
          public function getId(): ?int
          {
              return $this->id;
          }
      
          public function getUsername(): ?string
          {
              return $this->username;
          }
      
          public function setUsername(string $username): self
          {
              $this->username = $username;
      
              return $this;
          }
      
          public function getEmail(): ?string
          {
              return $this->email;
          }
      
          public function setEmail(string $email): self
          {
              $this->email = $email;
      
              return $this;
          }
      
          public function getRoles(): ?string
          {
              return $this->roles;
          }
      
          public function setRoles(string $roles): self
          {
              $this->roles = $roles;
      
              return $this;
          }
      
          public function getPassword(): ?string
          {
              return $this->password;
          }
      
          public function setPassword(string $password): self
          {
              $this->password = $password;
      
              return $this;
          }
      
           /**
           * getRoles
           *
           * @return array['ROLE_USER']
           */
         /* public function getRoles()
          {
              return ['ROLE_ADMIN'];
          }  
      
          /**
           * eraseCredentials
           *
           * @return void
           */
          public function eraseCredentials()
          {
              
          }
      
      
          /**
           * getSalt
           *
           * @return string | null
           */
          public function getSalt()
          {
              return null;
      
          }
      
          
      	/** @see \Serializable::serialize() */
          public function serialize()
          {
              return serialize([
                  $this->id,
                  $this->username,
                  $this->password,
                  // see section on salt below
                  // $this->salt,
              ]);
          }
      
       
          /**
           * unserialize
           *
           * @param  mixed $serialized
           *
           * @return void
           */
          public function unserialize($serialized)
          {
              list (
                  $this->id,
                  $this->username,
                  $this->password,
                  // see section on salt below
                  // $this->salt
              ) = unserialize($serialized, ['allowed_classes' => false]);
          }
      }
/*
Users.php
Affichage de Users.php en cours...
*/