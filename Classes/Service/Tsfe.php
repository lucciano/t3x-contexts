<?php
class Tx_Contexts_Service_Tsfe
{
    /**
     * Initialize the frontend user - contexts are initialized here.
     *
     * @param tslib_fe $pObj Calling object
     *
     * @return void
     */
    public function initFEuser($pObj)
    {
        Tx_Contexts_Context_Container::get()->initMatching();
    }

    /**
     * Check subpages for context from rootline
     * method is called from hook "hook_checkEnableFields"
     *
     * @param array $pObj key: pObj value: TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController
     *
     * @return boolean false if context from root not match
     */
    public function checkEnableFields($pObj)
    {
        $contexts = Tx_Contexts_Context_Container::get();
        $bFindExtendSubPage = 0;
        foreach (array_reverse($pObj['pObj']->rootLine) as $page) {
            //check extendtosubpages
            if ($page['extendToSubpages'] == '0' && $bFindExtendSubPage == 0) {
                continue;
            } else {
                $bFindExtendSubPage = 1;
            }

            $arEnable = explode(',', $page['tx_contexts_enable']);
            foreach ($arEnable as $nContextId) {
                if (!isset($contexts[$nContextId]) && $nContextId) {
                    return false;
                }
            }

            $arDisable = explode(',', $page['tx_contexts_disable']);
            foreach ($arDisable as $nContextId) {
                if (isset($contexts[$nContextId]) && $nContextId) {
                    return false;
                }
            }
        }

    }
}