Need forenames that "look real" for a UK orientated application (for example, for testing search facilities
or for creating a honeypot system)? Well, this is the [Faker](https://github.com/fzaninotto/Faker) provider library for you!

Seeded with data from the UK's Office Of National Statistics and containing 16,964 male first names/forenames/given names
and 22,174 female first names (based on registered births in England and Wales for 1996-2016 and Scotland 2016-2017) -
all complete with frequency weighting - so the data "looks right".

The names are formatted using [namecase](https://github.com/tamtamchik/namecase).

License
=======
The Data is available under the Open Government Licence v3.0 as per
http://www.nationalarchives.gov.uk/doc/open-government-licence/version/3/

This package is not supported/sponsored/acknowledged/recommended by the UK Government or the Office of National
Statistics. It is entirely unofficial.

Usage
=====

        $faker=new \Faker\Generator();
        $faker->addProvider(new \Bairwell\Faker\EnGbOns\Firstnames\Firstnames($faker));
        $fakeName=$faker->firstName;
