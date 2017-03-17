<?php
namespace Atemschutz\NachweisBundle\Test\Tauglichkeit;

use Atemschutz\NachweisBundle\Tauglichkeit\RequiredFor;

class RequiredForTest extends \PHPUnit_Framework_TestCase {
	
	public function testGetRequiredFors() {
		$requiredFors = RequiredFor::getRequiredFors();
		
		$this->assertEquals(3, count($requiredFors));
		$this->assertContains("keine", $requiredFors);
		$this->assertContains("Atemschutz (ATS 1)", $requiredFors);
		$this->assertContains("Chemikalienschutzanzug (ATS 2)", $requiredFors);
		$this->assertArrayHasKey(0, $requiredFors);
		$this->assertArrayHasKey(1, $requiredFors);
		$this->assertArrayHasKey(2, $requiredFors);
	}
}