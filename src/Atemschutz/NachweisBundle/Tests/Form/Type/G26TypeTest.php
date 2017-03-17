<?php
namespace Atemschutz\NachweisBundle\Test\Form\Type;

use Atemschutz\NachweisBundle\Entity\G26;

use Atemschutz\NachweisBundle\Form\Type\G26Type;

use Symfony\Component\Form\Tests\Extension\Core\Type\TypeTestCase;

class G26TypeTest extends TypeTestCase {
	public function testBindValidData() {
		$formData = array(
				'date' => '26.04.2013',
				'duedate' => '26.04.2013',
				'classification' => 3,
				'notice' => 'Noticenoticenotice',
				'valid' => true
		);
		
		$type = new G26Type();
		$form = $this->factory->create($type, null, array('edit' => true));
		
		$object = new G26();
		$object->setDate(new \DateTime($formData["date"]));
		$object->setDuedate(new \DateTime($formData["duedate"]));
		$object->setClassification($formData["classification"]);
		$object->setNotice($formData["notice"]);
		$object->setValid($formData["valid"]);
		
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