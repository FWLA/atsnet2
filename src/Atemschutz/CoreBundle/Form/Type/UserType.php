<?php
namespace Atemschutz\CoreBundle\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Atemschutz\CoreBundle\Security\Roles;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

/**
 * @author Benjamin Ihrig
 */
class UserType extends AbstractType {
	
	/**
	 * (non-PHPdoc)
	 * @see \Symfony\Component\Form\AbstractType::buildForm()
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$passwordRequired = ($options['edit'] == false);
		
		$builder->add('email', 'email', array('required' => true, 'label' => 'Email'));
		$builder->add('lastname', 'text', array('required' => true, 'label' => 'Nachname'));
		$builder->add('firstname', 'text', array('required' => true, 'label' => 'Vorname'));
		$builder->add('organisation', 'entity', array('required' => true, 'class' => 'AtemschutzCoreBundle:Organisation', 'label' => 'Organisation'));
		$builder->add('roles', 'choice', array('required' => true, 'label' => 'Rolle', 'multiple' => true, 'expanded' => true, 'choices' => $options['role_choices']));
		$builder->add('password', 'repeated', array('type' => 'password', 'required' => $passwordRequired, 'first_options' => array('label' => 'Passwort'), 'second_options' => array('label' => 'Passwort wiederholen')));
	
		if($options['fromAtsgt']) {
			$builder->get('lastname')->setDisabled(true);
			$builder->get('firstname')->setDisabled(true);
			$builder->get('organisation')->setDisabled(true);
		}
	}
	
	/**
	 * @param OptionsResolverInterface $resolver
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
			'edit' => false,
			'fromAtsgt' => false,
			'role_choices' => array(),
			'data_class' => 'Atemschutz\CoreBundle\Entity\User'
		));
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Symfony\Component\Form\FormTypeInterface::getName()
	 */
	public function getName() {
		return 'user';
	}
}