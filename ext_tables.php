<?php
if (!defined('TYPO3_MODE')) {
  die('Access denied.');
}


if (TYPO3_MODE === 'BE') {
  \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
    'TS.' . $_EXTKEY,
    'tools', 
    'restclient_ui',
    '',
    array(
      'HttpClientUi' => 'index',
      'History' =>  'index,delete'
    ),
    array(
      'access' => 'user,group',
      'icon'   => 'EXT:' . $_EXTKEY . '/ext_icon.gif',
      'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang.xlf',
    )
  );
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerAjaxHandler (
  'HttpClientUiController::sendRequest',
  'TS\\RestclientUi\\Controller\\HttpClientUiController->sendRequest'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_restclientui_domain_model_history', 'EXT:restclient_ui/Resources/Private/Language/locallang_csh_tx_restclientui_domain_model_history.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_restclientui_domain_model_history');
$GLOBALS['TCA']['tx_restclientui_domain_model_history'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:restclient_ui/Resources/Private/Language/locallang_db.xlf:tx_restclientui_domain_model_history',
		'label' => 'url',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'url,method',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/History.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_restclientui_domain_model_history.gif'
	),
);
