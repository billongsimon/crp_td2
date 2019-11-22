<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Article;
use App\Entity\Categorie;

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
    
}
