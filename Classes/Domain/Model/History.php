<?php
namespace TS\RestclientUi\Domain\Model;


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
 * History
 */
class History extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * url
	 *
	 * @var string
	 */
	protected $url = '';

	/**
	 * method
	 *
	 * @var string
	 */
	protected $method = '';

	/**
	 * header
	 *
	 * @var string
	 */
	protected $header = '';

	/**
	 * fields
	 *
	 * @var string
	 */
	protected $fields = '';  
  
  /**
	 * tstamp
	 *
	 * @var int
	 */
  protected $tstamp;

	/**
	 * Returns the url
	 *
	 * @return string $url
	 */
	public function getUrl() {
		return $this->url;
	}

	/**
	 * Sets the url
	 *
	 * @param string $url
	 * @return void
	 */
	public function setUrl($url) {
		$this->url = $url;
	}

	/**
	 * Returns the method
	 *
	 * @return string $method
	 */
	public function getMethod() {
		return $this->method;
	}

	/**
	 * Sets the method
	 *
	 * @param string $method
	 * @return void
	 */
	public function setMethod($method) {
		$this->method = $method;
	}

	/**
	 * Returns the header
	 *
	 * @return string $header
	 */
	public function getHeader() {
		return $this->header;
	}

	/**
	 * Sets the header
	 *
	 * @param string $header
	 * @return void
	 */
	public function setHeader($header) {
		$this->header = $header;
	}

	/**
	 * Returns the fields
	 *
	 * @return string $fields
	 */
	public function getFields() {
		return $this->fields;
	}

	/**
	 * Sets the fields
	 *
	 * @param string $fields
	 * @return void
	 */
	public function setFields($fields) {
		$this->fields = $fields;
	}  
  
  /**
  * Returns the tstamp
  *
  * @return int
  */
  public function getTstamp() {
    return $this->tstamp;
  }
 

}
