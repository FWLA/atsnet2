<?php
namespace Atemschutz\NachweisBundle\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\AbstractType;

/**
 * @author Benjamin Ihrig
 */
class G26Type extends AbstractType {
	
	/**
	 * (non-PHPdoc)
	 * @see \Symfony\Component\Form\AbstractType::buildForm()
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$currentDateTime = new \DateTime();
		$currentYear = $currentDateTime->format('Y');
		
		// date
		$lastYear = $currentYear;
		$firstYear = $currentYear - 40;
		
		$yearsDate = array();
		for($i = $lastYear; $i >= $firstYear; $i--) {
			$yearsDate[] = $i;
		}
		
		// duedate
		$lastYear = $currentYear + 3;
		$firstYear = $currentYear;
		
		$yearsDuedate = array();
		for($i = $lastYear; $i >= $firstYear; $i--) {
			$yearsDuedate[] = $i;
		}
		
		$builder->add('date', 'date', array('widget' => 'single_text', 'format' => 'dd.MM.yyyy', 'attr' => array('class' => 'date'), 'required' => true, 'years' => $yearsDate, 'label' => 'Datum'));
		$builder->add('duedate', 'date', array('widget' => 'single_text', 'format' => 'dd.MM.yyyy', 'attr' => array('class' => 'date'), 'required' => true, 'years' => $yearsDuedate, 'label' => 'gültig bis'));
		$builder->add('classification', 'choice', array('required' => true, 'choices' => array(3 => 3, 2 => 2, 1 => 1), 'label' => 'Gerätegruppe'));
		$builder->add('notice', 'textarea', array('required' => false, 'label' => 'Bemerkungen'));
		
		if($options['edit']) {
			$builder->add('valid', 'checkbox', array('required' => false, 'label' => 'Untersuchung gültig'));
		}
	}
	
	/**
	 * @param OptionsResolverInterface $resolver
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array(
				'data_class' => 'Atemschutz\NachweisBundle\Entity\G26',
				'edit' => false
		));
	}

	
	/**
	 * (non-PHPdoc)
	 * @see \Symfony\Component\Form\FormTypeInterface::getName()
	 */
	public function getName() {
		return 'g26';
	}
}