<?php

class tx_bxslider_pi1_wizicon {

	function proc($wizardItems)	{
		global $LANG;

		$LL = $this->includeLocalLang();

		$wizardItems['plugins_tx_bxslider_pi1'] = array(
			'icon' => t3lib_extMgm::extRelPath('bxslider') . 'Resources/Public/Icons/bxslider.png',
			'title' => $LANG->getLLL('pi1_title', $LL),
			'description' => $LANG->getLLL('pi1_plus_wiz_description', $LL),
            'params'=>'&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=bxslider_pi1'
		);

		return $wizardItems;
	}

	function includeLocalLang() {

		$localizationParser = t3lib_div::makeInstance('t3lib_l10n_parser_Llxml');
		$LOCAL_LANG = $localizationParser->getParsedData(
			t3lib_extMgm::extPath('bxslider') . 'Resources/Private/Language/locallang_be.xml',
			$GLOBALS['LANG']->lang
		);

		return $LOCAL_LANG;
	}
}
?>