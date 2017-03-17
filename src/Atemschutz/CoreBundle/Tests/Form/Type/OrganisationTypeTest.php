<?php
namespace Atemschutz\CoreBundle\Test\Form\Type;

use Atemschutz\CoreBundle\Entity\Organisation;

use Atemschutz\CoreBundle\Form\Type\OrganisationType;

use Symfony\Component\Form\Tests\Extension\Core\Type\TypeTestCase;

class OrganisationTypeTest extends TypeTestCase {
	public function testBindValidData() {
		$formData = array(
				'name' => 'Feuerwehr Lampertheim',
				'address1' => 'Florianstraße 4',
				'address2' => null,
				'plz' => '68623',
				'ort' => 'Lampertheim',
				'telefon' => '06206 94270',
		);
		
		$type = new OrganisationType();
		$form = $this->factory->create($type);
		
		$object = new Organisation();
		$object->setName($formData['name']);
		$object->setAddress1($formData['address1']);
		$object->setAddress2($formData['address2']);
		$object->setPlz($formData['plz']);
		$object->setOrt($formData['ort']);
		$object->setTelefon($formData['telefon']);
		
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