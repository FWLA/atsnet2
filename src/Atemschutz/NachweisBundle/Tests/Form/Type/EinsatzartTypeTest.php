<?php
namespace Atemschutz\NachweisBundle\Test\Form\Type;

use Atemschutz\NachweisBundle\Entity\Einsatzart;

use Atemschutz\NachweisBundle\Form\Type\EinsatzartType;

use Symfony\Component\Form\Tests\Extension\Core\Type\TypeTestCase;

class EinsatzartTypeTest extends TypeTestCase {
	public function testBindValidData() {
		$formData = array(
				'name' => 'Brandeinsatz'
		);
		
		$type = new EinsatzartType();
		$form = $this->factory->create($type);
		
		$object = new Einsatzart();
		$object->setName($formData["name"]);
		
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