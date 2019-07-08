<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController {

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
    return new Response(sprintf("Future page to show future article: %s", $slug));
  }

  /**
   * @Route("/news")
   */
  public function news()
  {
    return new Response("Future page to show a news!");
  }
}