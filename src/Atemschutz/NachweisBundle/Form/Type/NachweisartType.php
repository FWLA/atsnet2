<?php
namespace Atemschutz\NachweisBundle\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Atemschutz\NachweisBundle\Tauglichkeit\RequiredFor;

use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\AbstractType;

/**
 * @author Benjamin Ihrig
 */
class NachweisartType extends AbstractType {
	
	/**
	 * (non-PHPdoc)
	 * @see \Symfony\Component\Form\AbstractType::buildForm()
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('name', 'text', array('required' => true, 'label' => 'Name'));
		$builder->add('timevalid', 'integer', array('required' => false, 'label' => 'Gültigkeit in Monaten'));
		$builder->add('requiredFor', 'choice', array('required' => true, 'choices' => RequiredFor::getRequiredFors(), 'label' => 'Vorraussetung für'));
	}
	
	/**
	 * @param OptionsResolverInterface $resolver
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
				'data_class' => 'Atemschutz\NachweisBundle\Entity\Nachweisart'
		));
	}

	
	/**
	 * (non-PHPdoc)
	 * @see \Symfony\Component\Form\FormTypeInterface::getName()
	 */
	public function getName() {
		return 'nachweisart';
	}

}