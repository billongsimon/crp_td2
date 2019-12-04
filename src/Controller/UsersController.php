<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UsersController extends AbstractController
{
    /**
     * @Route("/users", name="users")
     */
    public function index()
    {
        return $this->render('users/index.html.twig', [
            'controller_name' => 'UsersController',
        ]);
        
    /**
     * @Route("/users/form", name="users.form")
     */
    public function usersForm(Request $request, ObjectManager $manager)
    {
        $article =new Article();
        $form = $this->createFormBuilder($article)
        ->add('name')
        ->add('email')
        ->add('image')
        ->add('login')
        ->add('password')
        ->add('users', EntityType::class, [
            'class' => Users::class,
            "choice_label" => 'titre'
      ])
         
        ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
        $manager->persist($article); 
        $manager->flush();
        return $this->redirectToRoute('admin.article', 
        ['id'=>$article->getId()]); // Redirection vers
        }
        return $this->render('users/useform.html.twig', [
            'formUsers' => $form->createView()
        ]);
    }


    /**
    * @Route("/administrateur/article/{id}", name="admin.article.modif")
    */
    
    public function modifArticle(Article $article, Request $request, ObjectManager $manager)
    {
        $form = $this->createFormBuilder($article)
        ->add('title')
        ->add('content')
        ->add('image')
        ->add('createdAt')
        ->add('resume')
        ->add('categorie', EntityType::class, [
            'class' => Categorie::class,
            "choice_label" => 'titre'
    ])
         
        ->getForm();
        $form->handleRequest($request);
                
        if($form->isSubMitted() && $form->isValid()){
            $manager->persist($article);
            $manager->flush();

            return $this->redirectToRoute('admin.article', 
            ['id'=>$article->getId()]); // Redirection vers l'article
        }
        return $this->render('administrateur/artmodif.html.twig', [
               'formModifArt' => $form->createView()
               ]);
    }
    /**
    * @Route("/administrateur/article/{id}/deletart", name="admin.article.sup")
    */
    
    public function supArticle($id, ObjectManager $Manager, Request $request)
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);
        $article = $repo->find($id);

        $Manager->remove($article);
        $Manager->flush();
        
        return $this->redirectToRoute('admin.article');
    }
    
 


    /**
     * @Route("/administrateur/categorie", name="admin.categorie")
     */
    public function categorie(PaginatorInterface $paginator, Request $request)
    {
        $repos=$this->getDoctrine() ->getRepository(Categorie::class);
        $categories=$paginator->paginate(
            $repos->findAll(),
            $request->query->getInt('page', 1), /*page number*/
             9 /*limit per page*/     );
            
        return $this->render('administrateur/categorie.html.twig', [
            'controller_name' => 'AdministrateurController',
        'categories'=>$categories
            ]);
    }

    /**
     * @Route("/users/form", name="users.form")
     */
    public function usersForm(Request $request, ObjectManager $manager)
    {
        $users = new Users();
        $form = $this->createFormBuilder($users)
                    ->add('name')
                    ->add('email')
                    ->add('login')
                    ->add('password')
                    ->getForm();

                    $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
        $manager->persist($categorie); 
        $manager->flush();
        return $this->redirectToRoute('admin.categorie', 
        ['id'=>$categorie->getId()]); // Redirection vers
        }
        return $this->render('users/useform.html.twig', [
            'formUsers' => $form->createView()
        ]);

    }
        
    }
}
