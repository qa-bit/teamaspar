<?php
namespace MotogpBundle\Admin\Media;


trait QuotationImageAdminTrait  {

    private function saveQuotationImage($object) {

        
        $quotationImageAdmin = $this
            ->getConfigurationPool()
            ->getAdminByAdminCode('motogp.admin.quotationImage');


        if ($object->getQuotationImage() && !$object->getQuotationImage()->isEnabled()) {
            $object->setQuotationImage(null);
            $quotationImageAdmin->deleteHook($object->getQuotationImage());
            return;
        }
        

        if ($object->getQuotationImage() && $object->getQuotationImage()->getUploadFile() ) {
            
            $quotationImageAdmin->saveHook($object->getQuotationImage());
        }
    }

}