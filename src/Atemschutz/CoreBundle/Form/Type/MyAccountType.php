<?php
namespace Atemschutz\CoreBundle\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\AbstractType;

class MyAccountType extends AbstractType {
	
	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('email', 'email', array('required' => true, 'label' => 'Email'));
		$builder->add('lastname', 'text', array('required' => true, 'label' => 'Nachname'));
		$builder->add('firstname', 'text', array('required' => true, 'label' => 'Vorname'));
		$builder->add('organisation', 'entity', array('required' => true, 'class' => 'AtemschutzCoreBundle:Organisation', 'label' => 'Organisation'));
		$builder->add('password', 'repeated', array('type' => 'password', 'required' => false, 'first_options' => array('label' => 'Passwort'), 'second_options' => array('label' => 'Passwort wiederholen')));
	
		$builder->get('email')->setDisabled(true);
		$builder->get('organisation')->setDisabled(true);
	}
	
	/**
	 * @param OptionsResolverInterface $resolver
	 */
	public function setDefaultOptions(
			OptionsResolverInterface $resolver) {
		return array(
			'data_class' => 'Atemschutz\CoreBundle\Entity\User'
		);
	}

	/**
	 * 
	 */
	public function getName() {
		return 'myAccount';
	}

}