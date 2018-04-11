<?php
namespace MotogpBundle\Admin\Media;


trait HeaderImageAdminTrait  {

    private function saveHeaderImage($object) {

        $logoAdmin = $this
            ->getConfigurationPool()
            ->getAdminByAdminCode('motogp.admin.headerimage');


        if ($object->getHeaderImage() && !$object->getHeaderImage()->isEnabled()) {
            $object->setHeaderImage(null);
            $logoAdmin->deleteHook($object->getHeaderImage());
            return;
        }
        

        if ($object->getHeaderImage() && $object->getHeaderImage()->getUploadFile() ) {
            $logoAdmin->saveHook($object->getHeaderImage());
        }
    }

}