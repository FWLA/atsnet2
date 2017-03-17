<?php
namespace Atemschutz\NachweisBundle\Test\Form\Type;

use Atemschutz\NachweisBundle\Entity\Nachweisart;

use Atemschutz\NachweisBundle\Form\Type\NachweisartType;

use Symfony\Component\Form\Tests\Extension\Core\Type\TypeTestCase;

class NachweisartTypeTest extends TypeTestCase {
	public function testBindValidData() {
		$formData = array(
				'name' => 'Atemschutzstrecke',
				'timevalid' => 12,
				'requiredFor' => 1
		);
		
		$type = new NachweisartType();
		$form = $this->factory->create($type);
		
		$object = new Nachweisart();
		$object->setName($formData["name"]);
		$object->setTimeValid($formData["timevalid"]);
		$object->setRequiredFor($formData["requiredFor"]);
		
		$form->bind($formData);
		
		$this->assertTrue($form->isSynchronized());
		$this->assertEquals($object, $form->getData());
		
		$view = $form->createView();
		$children = $view->children;
		
		foreach (array_keys($formData) as $key) {
			$this->assertArrayHasKey($key, $children);
		}
	}
}