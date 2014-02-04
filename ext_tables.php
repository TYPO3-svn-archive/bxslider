<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'bxSlider'
);

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'bxSlider');

t3lib_extMgm::addLLrefForTCAdescr('tx_bxslider_domain_model_bxslider', 'EXT:bxslider/Resources/Private/Language/locallang_csh_tx_bxslider_domain_model_bxslider.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_bxslider_domain_model_bxslider');
$TCA['tx_bxslider_domain_model_bxslider'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:bxslider/Resources/Private/Language/locallang_db.xml:tx_bxslider_domain_model_bxslider',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,images,',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/BxSlider.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_bxslider_domain_model_bxslider.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_bxslider_domain_model_bxsliderimage', 'EXT:bxslider/Resources/Private/Language/locallang_csh_tx_bxslider_domain_model_bxsliderimage.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_bxslider_domain_model_bxsliderimage');
$TCA['tx_bxslider_domain_model_bxsliderimage'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:bxslider/Resources/Private/Language/locallang_db.xml:tx_bxslider_domain_model_bxsliderimage',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,link,image,',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/BxSliderImage.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_bxslider_domain_model_bxsliderimage.gif'
	),
);

/**
 * Include Flexform
 */
// Pi1
$pluginSignature = str_replace('_', '', $_EXTKEY) . '_pi1';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_pi1.xml');

/**
 * Add icon in page tree
 */
if (TYPO3_MODE == 'BE') {

    // WizIcon for Pi1
    $TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses']['tx_bxslider_pi1_wizicon'] = t3lib_extMgm::extPath($_EXTKEY) . 'Classes/Utility/WizIcon.php';
}

?>