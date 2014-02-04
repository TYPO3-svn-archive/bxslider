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
class Tx_Bxslider_Controller_BxSliderController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * bxSliderRepository
	 *
	 * @var Tx_Bxslider_Domain_Repository_BxSliderRepository
	 */
	protected $bxSliderRepository;

	/**
	 * injectBxSliderRepository
	 *
	 * @param Tx_Bxslider_Domain_Repository_BxSliderRepository $bxSliderRepository
	 * @return void
	 */
	public function injectBxSliderRepository(Tx_Bxslider_Domain_Repository_BxSliderRepository $bxSliderRepository) {
		$this->bxSliderRepository = $bxSliderRepository;
	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {

        if (!isset($this->settings['flexform']['general']['form']) || !$this->settings['flexform']['general']['form']) {
            return;
        }

		// Load sliders
        $bxSliders = $this->bxSliderRepository->findByUids($this->settings['flexform']['general']['form']);
		$this->view->assign('bxSliders', $bxSliders);

        // Set slider settings
        if (!empty($this->settings['flexform']['settings'])) {

            $booleanParameters = array(
                'randomStart',
                'infiniteLoop',
                'hideControlOnEnd',
                'captions',
                'ticker',
                'tickerHover',
                'adaptiveHeight',
                'video',
                'responsive',
                'useCSS',
                'touchEnabled',
                'oneToOneTouch',
                'preventDefaultSwipeX',
                'preventDefaultSwipeY',
                'pager',
                'controls',
                'autoControls',
                'autoControlsCombine',
                'auto',
                'autoStart',
                'autoHover'
            );

            $integerParameters = array(
                'speed',
                'slideMargin',
                'startSlide',
                'adaptiveHeightSpeed',
                'swipeThreshold',
                'pause',
                'autoDelay',
                'minSlides',
                'maxSlides',
                'moveSlides',
                'slideWidth'
            );

            foreach($this->settings['flexform']['settings'] as $key => &$value) {
                if (in_array($key, $booleanParameters)) {
                    $value = (bool) $value;
                }
                elseif (in_array($key, $integerParameters)) {
                    $value = (integer) $value;
                }
            }
            $this->view->assign('sliderSettings', json_encode($this->settings['flexform']['settings']));
        }
	}

	/**
	 * action show
	 *
	 * @param Tx_Bxslider_Domain_Model_BxSlider $bxSlider
	 * @return void
	 */
	public function showAction(Tx_Bxslider_Domain_Model_BxSlider $bxSlider) {
		$this->view->assign('bxSlider', $bxSlider);
	}

}
?>