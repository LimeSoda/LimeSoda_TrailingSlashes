<?php

class LimeSoda_TrailingSlashes_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * @var string
     */
    const XML_PATH_CATEGORY_VIEW_ENABLED = 'web/ls_trailingslashes/category_view';

    /**
     * @var string
     */
    const XML_PATH_CMS_PAGE_VIEW_ENABLED = 'web/ls_trailingslashes/cms_page_view';

    /**
     * @var string
     */
    const XML_PATH_HTTP_STATUS_CODE = 'web/ls_trailingslashes/http_status_code';

    /**
     * @var string
     */
    const XML_PATH_OTHER_URLS = 'web/ls_trailingslashes/other_urls';

    /**
     * @var string
     */
    const XML_PATH_PRODUCT_VIEW_ENABLED = 'web/ls_trailingslashes/product_view';

    /**
     * Returns the HTTP status code to use for the redirect.
     *
     * @return int
     */
    public function getRedirectHttpStatusCode()
    {
        return intval(Mage::getStoreConfig(self::XML_PATH_HTTP_STATUS_CODE));
    }

    /**
     * Returns whether the redirect is enabled for the category view page.
     *
     * @return bool
     */
    public function shouldRedirectCategoryView()
    {
        return Mage::getStoreConfigFlag(self::XML_PATH_CATEGORY_VIEW_ENABLED);
    }

    /**
     * Returns whether the URL was specified to be redirected in the other URLs field.
     *
     * @param string $path
     * @return bool
     */
    public function shouldRedirectOtherUrl($path)
    {
        $paths = explode("\n", Mage::getStoreConfig(self::XML_PATH_OTHER_URLS));
        return in_array($path, $paths);
    }

    /**
     * Returns whether the redirect is enabled for the product view page.
     *
     * @return bool
     */
    public function shouldRedirectProductView()
    {
        return Mage::getStoreConfigFlag(self::XML_PATH_PRODUCT_VIEW_ENABLED);
    }

    /**
     * Returns whether the redirect is enabled for the category view page.
     *
     * @return bool
     */
    public function shouldRedirectCmsPageView()
    {
        return Mage::getStoreConfigFlag(self::XML_PATH_CMS_PAGE_VIEW_ENABLED);
    }
}
