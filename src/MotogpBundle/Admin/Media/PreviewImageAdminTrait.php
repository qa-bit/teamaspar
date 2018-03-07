<?php
namespace MotogpBundle\Admin\Media;


trait PreviewImageAdminTrait  {

    private function savePreviewImage($object) {

        $previewImageAdmin = $this
            ->getConfigurationPool()
            ->getAdminByAdminCode('motogp.admin.previewimage');


        if ($object->getPreviewImage() && !$object->getPreviewImage()->isEnabled()) {
            $object->setPreviewImage(null);
            $previewImageAdmin->deleteHook($object->getPreviewImage());
            return;
        }
        

        if ($object->getPreviewImage() && $object->getPreviewImage()->getUploadFile() ) {
            $previewImageAdmin->saveHook($object->getPreviewImage());
        }
    }

}