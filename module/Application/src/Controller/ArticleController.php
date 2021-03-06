<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Article;
class ArticleController extends AbstractActionController
{
    /**
     * Entity manager.
     * @var Doctrine\ORM\EntityManager
     */
    // const FEED_URL='http://feeds.bbci.co.uk/news/rss.xml';
    private $entityManager;

    /**
     * Article manager.
     * @var Application\Service\ArticleManager
     */
    private $articleManager;

    /**
     * Constructor is used for injecting dependencies into the controller.
     */
    public function __construct($entityManager, $articleManager)
    {
        $this->entityManager = $entityManager;
        $this->articleManager = $articleManager;
    }

    /**
     * This action displays the "New Article" page.
     * this page created to test more rss feeds url
     */
    public function addAction()
    {

      $message='';
      // action when submit
       if(isset($_POST['submit']) && ($_POST['feedurl'] != ''))
       {
          $url = $_POST['feedurl'];
          //validate url
          if (!filter_var($url,FILTER_VALIDATE_URL)) {
            $message='Invalid RSS feed URL';
          }else {
            // get content of RSS
            $content = file_get_contents($url);
            if(!empty($content)){
              $xml = new \SimpleXmlElement($content);
              // before add action delete all old records
              $this->articleManager->deleteAllAction();

              foreach($xml->channel->item as $entry) {
                $pubDate = date('Y-m-d H:i:s',strtotime($entry->pubDate));
                $data=array(
                    "name" => $entry->title,
                    "description" => $entry->description,
                    "link"   => $entry->link,
                    "date" =>$pubDate
                );
                // add new RSS Feeds
                $this->articleManager->addNewArticle($data);
              }
              // Redirect the user to "index" page list all Rss.
            return $this->redirect()->toRoute('application');
          }
      }
      }
        // Render the view template.
        return new ViewModel([
           'message'=>$message
        ]);
    }
}
