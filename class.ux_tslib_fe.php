<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2013 Netresearch GmbH & Co. KG <typo3-2013@netresearch.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Extending TYPO3 tslib_fe
 *
 * @author André Hähnel <andre.haehnel@netresearch.de>
 */
class ux_tslib_fe extends tslib_fe
{
    /**
    * (non-PHPdoc)
    * @see \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController::checkEnableFields($row, $bypassGroupCheck)
    */
    public function checkEnableFields($row,$bypassGroupCheck=FALSE)
    {
        $bResult = parent::checkEnableFields($row,$bypassGroupCheck);

        if ($bResult !== true) {
            return $bResult;
        }

        $arParams = array(
           'pObj' => &$this,
        );

        $test = new Tx_Contexts_Service_Tsfe();
        $bResult = $test->checkEnableFields($arParams);
        
        if ($bResult === false) {
            return null;
        } else {
            return true;
        }

    }
}

$xFile = 'typo3conf/ext/contexts/class.ux_tslib_fe.php';

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS'][$xFile]) {
    include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS'][$xFile]);
}
