<?php
/**
 * Created by PhpStorm.
 * User: egm
 * Date: 23/08/17
 * Time: 12:49
 */

namespace AppBundle\EventListener;

use Oneup\UploaderBundle\Event\PostPersistEvent;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\ModelImage;
use AppBundle\Entity\Model;

class UploadListener
{
    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function onUpload(PostPersistEvent $event)
    {
        $file   = $event->getFile();
        $request = $event->getRequest();
        $response = $event->getResponse();

        $response['files'] = [
            'url'=> $file->getRealPath(),
            'name'=> $file->getBaseName(),
            'type'=> $file->getType(),
            'size'=> $file->getSize(),
            'delete_type'=> "DELETE"
        ];

        return json_encode($response);
    }
}