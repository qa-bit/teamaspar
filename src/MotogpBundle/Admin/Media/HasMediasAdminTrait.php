<?php
namespace MotogpBundle\Admin\Media;


trait HasMediasAdminTrait  {
    
    private function saveMedias($object, $media_admin) {
        $postMediaAdmin = $this
            ->getConfigurationPool()
            ->getAdminByAdminCode($media_admin);

        foreach ($object->getMedias() as $m) {
            $m->setOwner($object);
            $postMediaAdmin->saveHook($m);
        }
    }
    
}