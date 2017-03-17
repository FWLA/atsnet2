<?php
namespace Atemschutz\NachweisBundle\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Atemschutz\CoreBundle\Form\Type\UserType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

/**
 * @author Benjamin Ihrig
 */
class AtemschutzgeraetetraegerType extends AbstractType {
	
	/**
	 * (non-PHPdoc)
	 * @see \Symfony\Component\Form\AbstractType::buildForm()
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('lastname', 'text', array('required' => true, 'label' => 'Nachname'));
		$builder->add('firstname', 'text', array('required' => true, 'label' => 'Vorname'));
		$builder->add('birthdate', 'date', array('widget' => 'single_text', 'format' => 'dd.MM.yyyy', 'attr' => array('class' => 'date'), 'required' => true, 'label' => 'Geburtstag'));
		$builder->add('organisation', 'entity', array('required' => true, 'class' => 'AtemschutzCoreBundle:Organisation', 'label' => 'Organisation'));
		$builder->add('ats1', 'date', array('widget' => 'single_text', 'format' => 'dd.MM.yyyy', 'attr' => array('class' => 'date'), 'required' => false, 'label' => 'Datum ATS 1'));
		$builder->add('ats2', 'date', array('widget' => 'single_text', 'format' => 'dd.MM.yyyy', 'attr' => array('class' => 'date'), 'required' => false, 'label' => 'Datum ATS 2'));
		
		if($options['edit']) {
			$builder->add('isActive', 'checkbox', array('required' => false, 'label' => 'Aktiv'));
		}
		
		if(!$options['edit']) {
			$builder->add('createUser', 'checkbox', array('required' => false, 'mapped' => false, 'label' => 'Benutzer (Login) erstellen?'));
		}
	}
	
	/**
	 * @param OptionsResolverInterface $resolver
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
				'data_class' => 'Atemschutz\NachweisBundle\Entity\Atemschutzgeraetetraeger',
				'edit' => false
		));
	}

	
	/**
	 * (non-PHPdoc)
	 * @see \Symfony\Component\Form\FormTypeInterface::getName()
	 */
	public function getName() {
		return 'atemschutzgeraetetraeger';
	}

}