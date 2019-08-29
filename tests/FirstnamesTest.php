<?php
declare(strict_types=1);

namespace Bairwell\Faker\EnGbOns\Firstnames\Tests;

use Bairwell\Faker\EnGbOns\Firstnames\Firstnames;
use Faker\Generator;
use Faker\Provider\Person;
use PHPUnit\Framework\TestCase;
/**
 * @coversDefaultClass \Bairwell\Faker\EnGbOns\Firstnames\Firstnames
 */
class FirstnamesTest extends TestCase
{

    /**
     * @covers ::__construct
     * @covers ::firstNameMale
     * @covers ::firstName
     * @testWith [1,"Freddie","George","Benjamin"]
     * [2,"Kai","Yusuf","Harry"]
     * [3,"Aidan","Archie","Jacob"]
     * [10,"Trevor","Leo","James"]
     * [100,"Maksymilian","Ben","James"]
     * [1000,"Kai","Willis","Tarik"]
     * [10000,"Ashley","George","Luke"]
     * [50000,"Oliver","James","Jahaan"]
     * [100000,"Marco","Max","Thomas"]
     */
    public function testFirstNameMale(int $seed, string $firstExpectedName, string $secondExpectedName, string $thirdExpectedName): void
    {
        $mock = $this->createMock(Generator::class);
        $provider = new Firstnames($mock);
        mt_srand($seed, MT_RAND_MT19937);
        $this->assertSame($firstExpectedName, $provider->firstName(Person::GENDER_MALE), 'First expected name from seed ' . $seed);
        $this->assertSame($secondExpectedName, $provider->firstName(Person::GENDER_MALE), 'Second expected name from seed ' . $seed);
        $this->assertSame($thirdExpectedName, $provider->firstName(Person::GENDER_MALE), 'Third expected name from seed ' . $seed);
    }


    /**
     * @covers ::firstNameMale
     * @testWith [1,"Freddie","George","Benjamin"]
     * [2,"Kai","Yusuf","Harry"]
     * [3,"Aidan","Archie","Jacob"]
     * [10,"Trevor","Leo","James"]
     * [100,"Maksymilian","Ben","James"]
     * [1000,"Kai","Willis","Tarik"]
     * [10000,"Ashley","George","Luke"]
     * [50000,"Oliver","James","Jahaan"]
     * [100000,"Marco","Max","Thomas"]
     */
    public function testFirstNameMaleStatic(int $seed, string $firstExpectedName, string $secondExpectedName, string $thirdExpectedName): void
    {
        mt_srand($seed, MT_RAND_MT19937);
        $this->assertSame($firstExpectedName, Firstnames::firstNameMale(), 'First expected name from seed ' . $seed);
        $this->assertSame($secondExpectedName, Firstnames::firstNameMale(), 'Second expected name from seed ' . $seed);
        $this->assertSame($thirdExpectedName, Firstnames::firstNameMale(), 'Third expected name from seed ' . $seed);
    }

    /**
     * @covers ::__construct
     * @covers ::firstName
     * @covers ::firstNameFemale
     * @testWith [1,"Rhyannon","Olivia","Scarlett"]
     * [2,"Molly","Maria","Rahimah"]
     * [3,"Lauren","Emma","Patrycja"]
     * [10,"Lauryn","Ellie","Ellie"]
     * [100,"Marley","Stacey","Aleeza"]
     * [1000,"Leila","Halimah","Dina"]
     * [10000,"Eloise","Amelia","Elisha"]
     * [50000,"Emelia","Isabel","Jasmine"]
     * [100000,"Amelia","Carmen","Louise"]
     */
    public function testFirstFemaleName(int $seed, string $firstExpectedName, string $secondExpectedName, string $thirdExpectedName): void
    {
        $mock = $this->createMock(Generator::class);
        $provider = new Firstnames($mock);
        mt_srand($seed, MT_RAND_MT19937);
        $this->assertSame($firstExpectedName, $provider->firstName(Person::GENDER_FEMALE), 'First expected name from seed ' . $seed);
        $this->assertSame($secondExpectedName, $provider->firstName(Person::GENDER_FEMALE), 'Second expected name from seed ' . $seed);
        $this->assertSame($thirdExpectedName, $provider->firstName(Person::GENDER_FEMALE), 'Third expected name from seed ' . $seed);
    }

    /**
     * @covers ::firstNameFemale
     * @testWith [1,"Rhyannon","Olivia","Scarlett"]
     * [2,"Molly","Maria","Rahimah"]
     * [3,"Lauren","Emma","Patrycja"]
     * [10,"Lauryn","Ellie","Ellie"]
     * [100,"Marley","Stacey","Aleeza"]
     * [1000,"Leila","Halimah","Dina"]
     * [10000,"Eloise","Amelia","Elisha"]
     * [50000,"Emelia","Isabel","Jasmine"]
     * [100000,"Amelia","Carmen","Louise"]
     */
    public function testFirstFemaleNameStatic(int $seed, string $firstExpectedName, string $secondExpectedName, string $thirdExpectedName): void
    {
        mt_srand($seed, MT_RAND_MT19937);
        $this->assertSame($firstExpectedName, Firstnames::firstNameFemale(), 'First expected name from seed ' . $seed);
        $this->assertSame($secondExpectedName, Firstnames::firstNameFemale(), 'Second expected name from seed ' . $seed);
        $this->assertSame($thirdExpectedName, Firstnames::firstNameFemale(), 'Third expected name from seed ' . $seed);
    }

    /**
     * @covers ::__construct
     * @covers ::firstName
     * @testWith [1,"Olivia","Callum","Lillian"]
     * [2,"Yusuf","Josephine","Dominic"]
     * [3,"Archie","Millie","Adam"]
     * [10,"Ellie","Lucca","Theo"]
     * [100,"Ben","Sophie","Elizabeth"]
     * [1000,"Halimah","Amber","Tara"]
     * [10000,"George","Carys","Jaya"]
     * [50000,"James","Mae","Eleonore"]
     * [100000,"Carmen","Kane","April"]
     */
    public function testFirstName(int $seed, string $firstExpectedName, string $secondExpectedName, string $thirdExpectedName): void
    {
        $mock = $this->getMockBuilder(Generator::class)
            ->onlyMethods(['parse'])
            ->getMock();
        $mock->method('parse')->willReturnCallback(function ($parse) {
            if ($parse === '{{firstNameMale}}') {
                return Firstnames::firstNameMale();
            }
            if ($parse === '{{firstNameFemale}}') {
                return Firstnames::firstNameFemale();
            }
            throw new \RuntimeException('Unexpected parse call');
        });
        $provider = new Firstnames($mock);
        mt_srand($seed, MT_RAND_MT19937);
        $this->assertSame($firstExpectedName, $provider->firstName(), 'First expected name from seed ' . $seed);
        $this->assertSame($secondExpectedName, $provider->firstName(), 'Second expected name from seed ' . $seed);
        $this->assertSame($thirdExpectedName, $provider->firstName(), 'Third expected name from seed ' . $seed);
    }
}