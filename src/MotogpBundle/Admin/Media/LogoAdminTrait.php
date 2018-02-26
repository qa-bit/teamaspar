<?php
namespace MotogpBundle\Admin\Media;


trait LogoAdminTrait  {

    private function saveLogo($object) {

        $logoAdmin = $this
            ->getConfigurationPool()
            ->getAdminByAdminCode('motogp.admin.logo');


        if ($object->getLogo() && !$object->getLogo()->isEnabled()) {
            $object->setLogo(null);
            $logoAdmin->deleteHook($object->getLogo());
            return;
        }
        

        if ($object->getLogo() && $object->getLogo()->getUploadFile() ) {
            $logoAdmin->saveHook($object->getLogo());
        }
    }

}