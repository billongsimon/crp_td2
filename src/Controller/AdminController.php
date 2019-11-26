<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Article;
use App\Entity\Categorie;
use App\Entity\Admin1;

use App\Form\Admin1Type;


use Doctrine\Common\Persistence\ObjectManager;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig', [
        'controller_name' => 'AdminController',
        ]);
     } 
    
     /**
     * @Route("/admin", name="admin")
     */
     public function listArticles(PaginatorInterface $paginator, Request $request)
     {
         $repo = $this->getDoctrine()->getRepository(Article::class);
         $articles = $paginator->paginate(
             $repo->findAll(),
             $request->query->getInt('page', 1), /*page number*/
              18 /*limit per page*/     );
 
         return $this->render('admin/index.html.twig', [
             'controller_name' => 'AdminController',
             'articles'=>$articles
         ]);
        }
        
         
    /**
     * @Route("/test/ardmin1", name="tes.admin1")
     */
    public function createAdmin(Request $request, ObjectManager $manager)
    {
        $admin1 =new Admin1();
        $form = $this->createForm(Admin1Type::class,$admin1);
                    // ->getForm();
       
        $form->handleRequest($request);
       
        if ($form->isSubmitted() && $form->isValid()) 
        {
            $manager->persist($article); 
            $manager->flush();
        }

        return $this->render('test/admin1.html.twig', [
            'formCreatAdmin' => $form->createView()
        ]);
     }    
    
}