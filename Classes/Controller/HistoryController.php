<?php
namespace TS\RestclientUi\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * HistoryController
 */
class HistoryController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * historyRepository
	 *
	 * @var \TS\RestclientUi\Domain\Repository\HistoryRepository
	 * @inject
	 */
	protected $historyRepository = NULL;
  
  protected $extConf = NULL;
  
  public function initializeAction() {
    $this -> extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['restclient_ui']);
    
    if ($this -> extConf['history_storage'] !== "") {  
      $querySettings = $this -> historyRepository -> createQuery() -> getQuerySettings();
      $querySettings -> setStoragePageIds(array(intval($this -> extConf['history_storage'])));
      $this -> historyRepository -> setDefaultQuerySettings($querySettings);
    }
  }  

	/**
	 * action list
	 *
	 * @return void
	 */
	public function indexAction() {    
		$histories = $this->historyRepository->findAll();
		$this->view->assign('histories', $histories);    
	}

	/**
	 * action delete
	 *
	 * @param \TS\RestclientUi\Domain\Model\History $history
	 * @return void
	 */
	public function deleteAction(\TS\RestclientUi\Domain\Model\History $history) {		
		$this->historyRepository->remove($history);
		$this->redirect('index');
	}

}
