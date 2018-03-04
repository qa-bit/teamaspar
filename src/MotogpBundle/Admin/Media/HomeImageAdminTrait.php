<?php
namespace MotogpBundle\Admin\Media;


trait HomeImageAdminTrait  {

    private function saveHomeImage($object) {

        $homeImageAdmin = $this
            ->getConfigurationPool()
            ->getAdminByAdminCode('motogp.admin.homeimage');


        if ($object->getHomeImage() && !$object->getHomeImage()->isEnabled()) {
            $object->setHomeImage(null);
            $homeImageAdmin->deleteHook($object->getHomeImage());
            return;
        }
        

        if ($object->getHomeImage() && $object->getHomeImage()->getUploadFile() ) {
            $homeImageAdmin->saveHook($object->getHomeImage());
        }
    }

}