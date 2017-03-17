<?php
namespace Atemschutz\NachweisBundle\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * @author Benjamin Ihrig
 */
class SearchNachweisType extends AbstractType {
	
	/**
	 * (non-PHPdoc)
	 * @see \Symfony\Component\Form\AbstractType::buildForm()
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('year', 'choice', array('required' => true, 'choices' => $options['years'], 'label' => 'Jahr'));
		$builder->add('einsatzNummer', 'integer', array('required' => true, 'label' => 'Einsatznummer'));
	}
	
	/**
	 * @param OptionsResolverInterface $resolver
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
				'years' => array()
		));
	}

	/**
	 * (non-PHPdoc)
	 * @see \Symfony\Component\Form\FormTypeInterface::getName()
	 */
	public function getName() {
		return 'search_nachweis';
	}

}