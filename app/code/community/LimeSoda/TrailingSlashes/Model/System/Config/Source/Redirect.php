<?php

class LimeSoda_TrailingSlashes_Model_System_Config_Source_Redirect
{
    public function toOptionArray()
    {
        return array(
            array('value' => 301, 'label' => Mage::helper('limesoda_trailingslashes')->__('301 (Moved Permanently)')),
            array('value' => 302, 'label' => Mage::helper('limesoda_trailingslashes')->__('302 (Found)')),
        );
    }
}