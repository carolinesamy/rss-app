<?php
namespace Application\Service;

use Application\Entity\Article;
// The ArticleManger service is responsible for adding new articles.
class ArticleManager
{
  /**
   * Doctrine entity manager.
   * @var Doctrine\ORM\EntityManager
   */
  private $entityManager;

  // Constructor is used to inject dependencies into the service.
  public function __construct($entityManager)
  {
    $this->entityManager = $entityManager;
  }

  // This method adds a new article.
  public function addNewArticle($data)
  {
    // Create new Post entity.
    $article = new Article();
    $article->setName($data['name']);
    $article->setDescription($data['description']);
    $article->setLink($data['link']);
    $article->setDate($data['date']);

    // Add the entity to entity manager.
    $this->entityManager->persist($article);
    // Apply changes to database.
    $this->entityManager->flush();
  }

  public function deleteAllAction() {

    $articles = $this->entityManager->getRepository(Article::class)->findAll();

    foreach ($articles as $article) {
        $this->entityManager->remove($article);
    }
    $this->entityManager->flush();
  }

}
