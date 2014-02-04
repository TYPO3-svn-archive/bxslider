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
 * Test case for class Tx_Bxslider_Domain_Model_BxSlider.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage bxSlider
 *
 * @author Maxim Bidiuk <maxim@jcmedia.de>
 */
class Tx_Bxslider_Domain_Model_BxSliderTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Bxslider_Domain_Model_BxSlider
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Bxslider_Domain_Model_BxSlider();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setNameForStringSetsName() { 
		$this->fixture->setName('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getName()
		);
	}
	
	/**
	 * @test
	 */
	public function getImagesReturnsInitialValueForObjectStorageContainingTx_Bxslider_Domain_Model_BxSliderImage() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getImages()
		);
	}

	/**
	 * @test
	 */
	public function setImagesForObjectStorageContainingTx_Bxslider_Domain_Model_BxSliderImageSetsImages() { 
		$image = new Tx_Bxslider_Domain_Model_BxSliderImage();
		$objectStorageHoldingExactlyOneImages = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneImages->attach($image);
		$this->fixture->setImages($objectStorageHoldingExactlyOneImages);

		$this->assertSame(
			$objectStorageHoldingExactlyOneImages,
			$this->fixture->getImages()
		);
	}
	
	/**
	 * @test
	 */
	public function addImageToObjectStorageHoldingImages() {
		$image = new Tx_Bxslider_Domain_Model_BxSliderImage();
		$objectStorageHoldingExactlyOneImage = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneImage->attach($image);
		$this->fixture->addImage($image);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneImage,
			$this->fixture->getImages()
		);
	}

	/**
	 * @test
	 */
	public function removeImageFromObjectStorageHoldingImages() {
		$image = new Tx_Bxslider_Domain_Model_BxSliderImage();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($image);
		$localObjectStorage->detach($image);
		$this->fixture->addImage($image);
		$this->fixture->removeImage($image);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getImages()
		);
	}
	
}
?>