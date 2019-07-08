<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

  /**
   * @Route("/")
   */
  public function homepage()
  {
    return new Response("OMG. My first pagealready!");
  }

  /**
   * @Route("/news/{slug}")
   */
  public function show($slug)
  {
    $comments = [
      'I ate normal rock once.',
      'Wohoo! I\'m going on asteroid diet.',
      'I like bacon too! Buy some for me.'
    ];

    dump($slug, $this);
    return $this->render('article/show.html.twig', [
      'title' => ucwords(str_replace('-', ' ', $slug)),
      'comments' => $comments
    ]);
  }
  
}