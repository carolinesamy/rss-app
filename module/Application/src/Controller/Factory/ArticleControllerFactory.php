<?php
namespace Application\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Application\Service\ArticleManager;
use Application\Controller\ArticleController;

/**
 * This is the factory for ArticleController. Its purpose is to instantiate the
 * controller.
 */
class ArticleControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container,
                           $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $ArticleManager = $container->get(ArticleManager::class);

        // Instantiate the controller and inject dependencies
        return new ArticleController($entityManager, $ArticleManager);
    }
}
