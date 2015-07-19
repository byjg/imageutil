<?php

namespace ByJG\ImageUtil;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-07-18 at 15:57:18.
 */
class ImageUtilTest extends \PHPUnit_Framework_TestCase
{

	/**
	 * @var ImageUtil
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		$resourceImg = imagecreatetruecolor(500, 100);
		$this->object = new ImageUtil($resourceImg);
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown()
	{
		
	}

	/**
	 * @covers ByJG\ImageUtil\ImageUtil::getWidth
	 */
	public function testGetWidth()
	{
		$this->assertSame(500, $this->object->getWidth());
	}

	/**
	 * @covers ByJG\ImageUtil\ImageUtil::getHeight
	 */
	public function testGetHeight()
	{
		$this->assertSame(100, $this->object->getHeight());
	}

	protected function getResourceString($resourceImg)
	{
		ob_start();
		imagejpeg($resourceImg, null, 100);
		$resourceStr = ob_get_contents();
		ob_end_clean();

		return base64_encode($resourceStr);
	}

	/**
	 * @covers ByJG\ImageUtil\ImageUtil::getImage
	 * @todo   Implement testGetImage().
	 */
	public function testGetImage()
	{
		// Create the object
		$resourceImg = imagecreatetruecolor(500, 100);
		$expected = $this->getResourceString($resourceImg);

		$result = $this->getResourceString($this->object->getImage());

		$this->assertEquals($expected, $result);
	}

	/**
	 * @covers ByJG\ImageUtil\ImageUtil::rotate
	 */
	public function testRotate()
	{
		$image = new ImageUtil(__DIR__ . '/rotate.png');

		$this->object->rotate(45, 230);
		
		$this->assertEquals($this->getResourceString($image->getImage()), $this->getResourceString($this->object->getImage()));
	}

	/**
	 * @covers ByJG\ImageUtil\ImageUtil::flip
	 */
	public function testFlip_Vertical()
	{
		$image = new ImageUtil(__DIR__.'/flip-vertical.png');

		$this->object->rotate(10, 230);
		$this->object->flip(Enum\Flip::VERTICAL);

		$this->assertEquals($this->getResourceString($image->getImage()), $this->getResourceString($this->object->getImage()));
	}

	/**
	 * @covers ByJG\ImageUtil\ImageUtil::flip
	 */
	public function testFlip_Both()
	{
		$image = new ImageUtil(__DIR__.'/flip-both.png');

		$this->object->rotate(80, 230);
		$this->object->flip(Enum\Flip::BOTH);

		$this->assertEquals($this->getResourceString($image->getImage()), $this->getResourceString($this->object->getImage()));
	}

	/**
	 * @covers ByJG\ImageUtil\ImageUtil::flip
	 */
	public function testFlip_Horizontal()
	{
		$image = new ImageUtil(__DIR__.'/flip-horizontal.png');

		$this->object->rotate(80, 230);
		$this->object->flip(Enum\Flip::HORIZONTAL);

		$this->assertEquals($this->getResourceString($image->getImage()), $this->getResourceString($this->object->getImage()));
	}

	/**
	 * @covers ByJG\ImageUtil\ImageUtil::resize
	 */
	public function testResize()
	{
		// Create the object
		$resourceImg = imagecreatetruecolor(800, 30);
		$expected = $this->getResourceString($resourceImg);

		$this->object->resize(800, 30);
		$result = $this->getResourceString($this->object->getImage());

		$this->assertEquals($expected, $result);
	}

	/**
	 * @covers ByJG\ImageUtil\ImageUtil::resizeSquare
	 * @todo   Implement testResizeSquare().
	 */
	public function testResizeSquare()
	{
		$image = new ImageUtil(__DIR__.'/resize_square.png');

		$this->object->resizeSquare(400, 255, 0, 0);

		$this->assertEquals($this->getResourceString($image->getImage()), $this->getResourceString($this->object->getImage()));
	}

	/**
	 * @covers ByJG\ImageUtil\ImageUtil::resizeAspectRatio
	 */
	public function testResizeAspectRatio()
	{
		$image = new ImageUtil(__DIR__.'/resize_aspectratio.png');

		$this->object->resizeAspectRatio(400, 200, 255, 0, 0);

		$this->assertEquals($this->getResourceString($image->getImage()), $this->getResourceString($this->object->getImage()));
	}

	/**
	 * @covers ByJG\ImageUtil\ImageUtil::stampImage
	 * @todo   Implement testStampImage().
	 */
	public function testStampImage()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
				'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ByJG\ImageUtil\ImageUtil::writeText
	 * @todo   Implement testWriteText().
	 */
	public function testWriteText()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
				'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ByJG\ImageUtil\ImageUtil::crop
	 * @todo   Implement testCrop().
	 */
	public function testCrop()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
				'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ByJG\ImageUtil\ImageUtil::getFilename
	 * @covers ByJG\ImageUtil\ImageUtil::save
	 */
	public function testSave_Default()
	{
		$fileName = $this->object->getFilename();

		$this->object->save();
		$this->assertFileExists($fileName);

		$image = new ImageUtil($fileName);
		$this->assertEquals($this->getResourceString($this->object->getImage()), $this->getResourceString($image));

		unlink($fileName);
	}

	/**
	 * @covers ByJG\ImageUtil\ImageUtil::getFilename
	 * @covers ByJG\ImageUtil\ImageUtil::save
	 */
	public function testSave_NewName()
	{
		$fileName = sys_get_temp_dir() . '/testing.png';

		$this->object->save($fileName);
		$this->assertFileExists($fileName);

		$image = new ImageUtil($fileName);
		$this->assertEquals($this->getResourceString($this->object->getImage()), $this->getResourceString($image));

		unlink($fileName);
	}

	/**
	 * @covers ByJG\ImageUtil\ImageUtil::show
	 * @todo   Implement testShow().
	 */
	public function testShow()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
				'This test has not been implemented yet.'
		);
	}

	/**
	 * @covers ByJG\ImageUtil\ImageUtil::restore
	 * @todo   Implement testRestore().
	 */
	public function testRestore()
	{
		$expected = $this->getResourceString($this->object->getImage());
		
		// Do some operactions
		$this->object->rotate(30);
		$this->object->flip(Enum\Flip::BOTH);
		$this->object->resizeSquare(40);

		$this->assertNotEquals($expected, $this->getResourceString($this->object->getImage()));

		$this->object->restore();

		$this->assertEquals($expected, $this->getResourceString($this->object->getImage()));

	}

	/**
	 * @covers ByJG\ImageUtil\ImageUtil::makeTransparent
	 * @todo   Implement testMakeTransparent().
	 */
	public function testMakeTransparent()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
				'This test has not been implemented yet.'
		);
	}
}
