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
