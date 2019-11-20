<?php


namespace App\Controller;


use App\Service\MarkdownHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

  /**
   * @Route("/", name="app_homepage")
   */
  public function homepage()
  {
    return $this->render('article/homepage.html.twig');
  }

  /**
   * @Route("/news/{slug}", name="article_show")
   */
  public function show($slug, MarkdownHelper $markdownHelper)
  {
    $comments = [
      'I ate normal rock once.',
      'Wohoo! I\'m going on asteroid diet.',
      'I like bacon too! Buy some for me.'
    ];

    $articleContent = <<<EOF
Spicy **jalapeno bacon** ipsum dolor amet veniam shank in dolore. Ham hock nisi landjaeger cow,
lorem proident [beef ribs](http://baconipsum.com/) aute enim veniam ut cillum **pork chuck** picanha. Dolore reprehenderit
labore minim pork belly spare ribs cupim short loin in. Elit exercitation eiusmod dolore cow
turkey shank eu pork belly meatball non cupim.
EOF;


     $articleContent = $markdownHelper->parse($articleContent);
    
    return $this->render('article/show.html.twig', [
      'title' => ucwords(str_replace('-', ' ', $slug)),
      'articleContent' => $articleContent,
      'comments' => $comments,
      'slug' => $slug
    ]);
  }

  /**
   * @Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
   */
  public function toggleArticleHeart($slug)
  {
    //TODO::heart/unheart
    
    return new JsonResponse(['hearts' => rand(5, 100)]);
  }
  
}