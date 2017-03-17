<?php
namespace Atemschutz\NachweisBundle\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\AbstractType;

/**
 * @author Benjamin Ihrig
 */
class BulkNachweisType extends AbstractType {
	
	/**
	 * (non-PHPdoc)
	 * @see \Symfony\Component\Form\AbstractType::buildForm()
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('date', 'date', array('widget' => 'single_text', 'format' => 'dd.MM.yyyy', 'attr' => array('class' => 'date'), 'required' => true, 'label' => 'Datum'));
		$builder->add('location', 'text', array('attr' => array('class' => 'location'), 'required' => true, 'label' => 'Ort'));
		$builder->add('nachweisart', 'entity', array('required' => true, 'class' => 'AtemschutzNachweisBundle:Nachweisart', 'label' => 'Nachweisart'));
		$builder->add('einsatzart', 'entity', array('required' => true, 'class' => 'AtemschutzNachweisBundle:Einsatzart', 'label' => 'Einsatzart'));
		$builder->add('einsatzNummer', 'integer', array('required' => false, 'label' => 'Einsatznummer'));
	}

	/**
	 * @param OptionsResolverInterface $resolver
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
				'data_class' => 'Atemschutz\NachweisBundle\Entity\Nachweis'
		));
	}

	/**
	 * (non-PHPdoc)
	 * @see \Symfony\Component\Form\FormTypeInterface::getName()
	 */
	public function getName() {
		return 'bulknachweis';
	}
}