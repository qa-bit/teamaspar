<?php
namespace MotogpBundle\Admin\Media;


trait LogoAdminTrait  {

    private function saveLogo($object) {

        $logoAdmin = $this
            ->getConfigurationPool()
            ->getAdminByAdminCode('motogp.admin.logo');

        

        if ($object->getLogo() && $object->getLogo()->getUploadFile() ) {
            $logoAdmin->saveHook($object->getLogo());
        }
    }

}