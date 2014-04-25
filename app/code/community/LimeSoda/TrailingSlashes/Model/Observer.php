<?php

class LimeSoda_TrailingSlashes_Model_Observer
{
    /**
     * Initiates the redirect to the same URL without trailing slash.
     *
     * @return void
     */
    protected function _redirect()
    {
        $currentUrl = Mage::helper('core/url')->getCurrentUrl();
        if (substr($currentUrl, -1) === '/') {
            $url = rtrim($currentUrl, '/');
            $code = Mage::helper('limesoda_trailingslashes')->getRedirectHttpStatusCode();
            Mage::app()->getResponse()->setRedirect($url, $code)->sendResponse();
            exit;
        }
    }

    /**
     * @param Varien_Event_Observer $observer
     * @return LimeSoda_TrailingSlashes_Model_Observer
     */
    public function predispatchCatalogCategoryView(Varien_Event_Observer $observer)
    {
        if (Mage::helper('limesoda_trailingslashes')->shouldRedirectCategoryView()) {
            $this->_redirect();
        }
        return $this;
    }

    /**
     * @param Varien_Event_Observer $observer
     * @return LimeSoda_TrailingSlashes_Model_Observer
     */
    public function predispatchCatalogProductView(Varien_Event_Observer $observer)
    {
        if (Mage::helper('limesoda_trailingslashes')->shouldRedirectProductView()) {
            $this->_redirect();
        }
        return $this;
    }

    /**
     * @param Varien_Event_Observer $observer
     * @return LimeSoda_TrailingSlashes_Model_Observer
     */
    public function predispatchCmsPageView(Varien_Event_Observer $observer)
    {
        if (Mage::helper('limesoda_trailingslashes')->shouldRedirectCmsPageView()) {
            $this->_redirect();
        }
        return $this;
    }
}
