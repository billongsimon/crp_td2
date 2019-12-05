<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Users;
class SecurityController extends AbstractController
{
    /**
     * @Route("/security", name="security")
     */
    public function index()
    {
        return $this->render('security/index.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }

    /**
     * @Route("/users", name="users")
     */
    public function users( )
    {
        $repo=$this->getDoctrine() ->getRepository(Users::class);
        
            $users =$repo->findAll();
            
        return $this->render('security/users.html.twig', [
            'controller_name' => 'UsersController'

            ]);
    }

    /**
     * @Route("/users/form/users", name="users.form")
     */
    public function UsersForm(Request $request, ObjectManager $manager)
    {
        $users =new Users();
        $form = $this->createFormBuilder($users)
        ->add('name')
        ->add('email')
        ->add('login')
        ->add('password')
        ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
        $manager->persist($users); 
        $manager->flush();
        return $this->redirectToRoute('users', 
        ['id'=>$users->getId()]); 
        }
        return $this->render('security/usersform.html.twig', [
            'formUsers' => $form->createView()
        ]);
    }
    
    /**
    * @Route("/users/{id}", name="users.modif")
    */
    
    public function modifUsers(users $users, Request $request, ObjectManager $manager)
    {
        $form = $this->createFormBuilder($users)
        ->add('name')
        ->add('email')
        ->add('login')
        ->add('password')         
    
        ->getForm();
        $form->handleRequest($request);
                
        if($form->isSubMitted() && $form->isValid()){
        $manager->persist($users);
        $manager->flush();

        return $this->redirectToRoute('users', 
        ['id'=>$users->getId()]); 
        }
        return $this->render('security/usermodif.html.twig', [
        'formModifUsers' => $form->createView()
        ]);
    }
    /**
    * @Route("/users/{id}/deletusers", name="users.sup")
    */
    
    public function supUsers($id, ObjectManager $Manager, Request $request)
    {
        $repo = $this->getDoctrine()->getRepository(Users::class);
        $user = $repo->find($id);

        $Manager->remove($users);
        $Manager->flush();
        
        
        return $this->redirectToRoute('users');
    }
    
    

    
}
    


