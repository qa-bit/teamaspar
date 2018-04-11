<?php
namespace MotogpBundle\Admin\Media;


trait FooterImageAdminTrait  {

    private function saveFooterImage($object) {

        $logoAdmin = $this
            ->getConfigurationPool()
            ->getAdminByAdminCode('motogp.admin.footerimage');


        if ($object->getFooterImage() && !$object->getFooterImage()->isEnabled()) {
            $object->setFooterImage(null);
            $logoAdmin->deleteHook($object->getFooterImage());
            return;
        }
        

        if ($object->getFooterImage() && $object->getFooterImage()->getUploadFile() ) {
            $logoAdmin->saveHook($object->getFooterImage());
        }
    }

}