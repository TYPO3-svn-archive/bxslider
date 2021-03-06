<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Maxim Bidiuk <maxim@jcmedia.de>, JCMedia Internetagentur GmbH
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
 *
 *
 * @package bxslider
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_Bxslider_Controller_BxSliderImageController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * bxSliderImageRepository
	 *
	 * @var Tx_Bxslider_Domain_Repository_BxSliderImageRepository
	 */
	protected $bxSliderImageRepository;

	/**
	 * injectBxSliderImageRepository
	 *
	 * @param Tx_Bxslider_Domain_Repository_BxSliderImageRepository $bxSliderImageRepository
	 * @return void
	 */
	public function injectBxSliderImageRepository(Tx_Bxslider_Domain_Repository_BxSliderImageRepository $bxSliderImageRepository) {
		$this->bxSliderImageRepository = $bxSliderImageRepository;
	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$bxSliderImages = $this->bxSliderImageRepository->findAll();
		$this->view->assign('bxSliderImages', $bxSliderImages);
	}

	/**
	 * action show
	 *
	 * @param Tx_Bxslider_Domain_Model_BxSliderImage $bxSliderImage
	 * @return void
	 */
	public function showAction(Tx_Bxslider_Domain_Model_BxSliderImage $bxSliderImage) {
		$this->view->assign('bxSliderImage', $bxSliderImage);
	}

}
?>