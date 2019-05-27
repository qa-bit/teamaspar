<?php
namespace MotogpBundle\Admin\Media;


trait TeamStaffImageAdminTrait  {

    private function saveTeamStaffImage($object) {

        
        $quotationImageAdmin = $this
            ->getConfigurationPool()
            ->getAdminByAdminCode('motogp.admin.teamStaffImage');


        if ($object->getTeamStaffImage() && !$object->getTeamStaffImage()->isEnabled()) {
            $object->setTeamStaffImage(null);
            $quotationImageAdmin->deleteHook($object->getTeamStaffImage());
            return;
        }
        

        if ($object->getTeamStaffImage() && $object->getTeamStaffImage()->getUploadFile() ) {
            
            $quotationImageAdmin->saveHook($object->getTeamStaffImage());
        }
    }

}