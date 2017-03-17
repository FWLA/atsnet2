<?php
namespace Atemschutz\CoreBundle\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

/**
 * @author Benjamin Ihrig
 */
class OrganisationType extends AbstractType {
	
	/**
	 * (non-PHPdoc)
	 * @see \Symfony\Component\Form\AbstractType::buildForm()
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('name', 'text', array("required" => true, "label" => "Name"));
		$builder->add('address1', 'text', array("required" => true, "label" => "Adresse"));
		$builder->add('address2', 'text', array("required" => false, "label" => "Adresszusatz"));
		$builder->add('plz', 'text', array("required" => true, "label" => "PLZ"));
		$builder->add('ort', 'text', array("required" => true, "label" => "Ort"));
		$builder->add('telefon', 'text', array("required" => false, "label" => "Telefon"));
	}
	
	/**
	 * @param OptionsResolverInterface $resolver
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
			'data_class' => 'Atemschutz\CoreBundle\Entity\Organisation'
		));
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Symfony\Component\Form\FormTypeInterface::getName()
	 */
	public function getName() {
		return 'organisation';
	}
}