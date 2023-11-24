<?php

namespace Shahonseven\MyKad\Test;

use PHPUnit\Framework\TestCase;
use Shahonseven\MyKad\Enums\Gender;
use Shahonseven\MyKad\Enums\StateCode;
use Shahonseven\MyKad\Exceptions\InvalidCharacterException;
use Shahonseven\MyKad\Exceptions\InvalidDateException;
use Shahonseven\MyKad\Exceptions\InvalidLengthException;
use Shahonseven\MyKad\MyKad;

class MyKadTest extends TestCase
{
    public function testInputIsValid()
    {
        $this->assertTrue((new MyKad(720413335315))->isValid());
        $this->assertTrue((new MyKad('720413335315'))->isValid());
        $this->assertTrue((new MyKad('720413-33-5315'))->isValid());
        $this->assertEquals(StateCode::PAHANG, (new MyKad(720413335315))->stateName());
        $this->assertEquals(Gender::MALE, (new MyKad(720413335315))->gender());
        $this->assertEquals('13-04-1972', (new MyKad(720413335315))->dateOfBirth()->format('d-m-Y'));

        $this->assertTrue((new MyKad(650616105032))->isValid());
        $this->assertEquals(StateCode::SELANGOR, (new MyKad(650616105032))->stateName(), );
        $this->assertEquals(Gender::FEMALE, (new MyKad(650616105032))->gender());
        $this->assertEquals('16-06-1965', (new MyKad(650616105032))->dateOfBirth()->format('d-m-Y'));

        $this->assertTrue((new MyKad(120121100419))->isValid());
        $this->assertEquals(StateCode::SELANGOR, (new MyKad(120121100419))->stateName());
        $this->assertEquals(Gender::MALE, (new MyKad(120121100419))->gender());
        $this->assertEquals('21-01-2000', (new MyKad('000121100819'))->dateOfBirth()->format('d-m-Y'));

        $this->assertEquals(StateCode::EMPTY, (new MyKad('720413-00-5315'))->stateName());
        $this->assertEquals(StateCode::EMPTY, (new MyKad('720413-17-5315'))->stateName());
        $this->assertEquals(StateCode::EMPTY, (new MyKad('720413-18-5315'))->stateName());
        $this->assertEquals(StateCode::EMPTY, (new MyKad('720413-19-5315'))->stateName());
        $this->assertEquals(StateCode::EMPTY, (new MyKad('720413-20-5315'))->stateName());
        $this->assertEquals(StateCode::EMPTY, (new MyKad('720413-69-5315'))->stateName());
        $this->assertEquals(StateCode::EMPTY, (new MyKad('720413-70-5315'))->stateName());
        $this->assertEquals(StateCode::EMPTY, (new MyKad('720413-73-5315'))->stateName());
        $this->assertEquals(StateCode::EMPTY, (new MyKad('720413-80-5315'))->stateName());
        $this->assertEquals(StateCode::EMPTY, (new MyKad('720413-81-5315'))->stateName());
        $this->assertEquals(StateCode::EMPTY, (new MyKad('720413-94-5315'))->stateName());
        $this->assertEquals(StateCode::EMPTY, (new MyKad('720413-95-5315'))->stateName());
        $this->assertEquals(StateCode::EMPTY, (new MyKad('720413-96-5315'))->stateName());
        $this->assertEquals(StateCode::EMPTY, (new MyKad('720413-97-5315'))->stateName());

        $this->assertEquals(StateCode::JOHOR, (new MyKad('720413-01-5315'))->stateName());
        $this->assertEquals(StateCode::JOHOR, (new MyKad('720413-21-5315'))->stateName());
        $this->assertEquals(StateCode::JOHOR, (new MyKad('720413-22-5315'))->stateName());
        $this->assertEquals(StateCode::JOHOR, (new MyKad('720413-23-5315'))->stateName());
        $this->assertEquals(StateCode::JOHOR, (new MyKad('720413-24-5315'))->stateName());

        $this->assertEquals(StateCode::KEDAH, (new MyKad('720413-02-5315'))->stateName());
        $this->assertEquals(StateCode::KEDAH, (new MyKad('720413-25-5315'))->stateName());
        $this->assertEquals(StateCode::KEDAH, (new MyKad('720413-26-5315'))->stateName());
        $this->assertEquals(StateCode::KEDAH, (new MyKad('720413-27-5315'))->stateName());

        $this->assertEquals(StateCode::KELANTAN, (new MyKad('720413-03-5315'))->stateName());
        $this->assertEquals(StateCode::KELANTAN, (new MyKad('720413-28-5315'))->stateName());
        $this->assertEquals(StateCode::KELANTAN, (new MyKad('720413-29-5315'))->stateName());

        $this->assertEquals(StateCode::MALACCA, (new MyKad('720413-04-5315'))->stateName());
        $this->assertEquals(StateCode::MALACCA, (new MyKad('720413-30-5315'))->stateName());

        $this->assertEquals(StateCode::NEGERI_SEMBILAN, (new MyKad('720413-05-5315'))->stateName());
        $this->assertEquals(StateCode::NEGERI_SEMBILAN, (new MyKad('720413-31-5315'))->stateName());
        $this->assertEquals(StateCode::NEGERI_SEMBILAN, (new MyKad('720413-59-5315'))->stateName());

        $this->assertEquals(StateCode::PAHANG, (new MyKad('720413-06-5315'))->stateName());
        $this->assertEquals(StateCode::PAHANG, (new MyKad('720413-32-5315'))->stateName());
        $this->assertEquals(StateCode::PAHANG, (new MyKad('720413-33-5315'))->stateName());

        $this->assertEquals(StateCode::PENANG, (new MyKad('720413-07-5315'))->stateName());
        $this->assertEquals(StateCode::PENANG, (new MyKad('720413-34-5315'))->stateName());
        $this->assertEquals(StateCode::PENANG, (new MyKad('720413-35-5315'))->stateName());

        $this->assertEquals(StateCode::PERAK, (new MyKad('720413-08-5315'))->stateName());
        $this->assertEquals(StateCode::PERAK, (new MyKad('720413-36-5315'))->stateName());
        $this->assertEquals(StateCode::PERAK, (new MyKad('720413-37-5315'))->stateName());
        $this->assertEquals(StateCode::PERAK, (new MyKad('720413-38-5315'))->stateName());
        $this->assertEquals(StateCode::PERAK, (new MyKad('720413-39-5315'))->stateName());

        $this->assertEquals(StateCode::PERLIS, (new MyKad('720413-09-5315'))->stateName());
        $this->assertEquals(StateCode::PERLIS, (new MyKad('720413-40-5315'))->stateName());

        $this->assertEquals(StateCode::SELANGOR, (new MyKad('720413-10-5315'))->stateName());
        $this->assertEquals(StateCode::SELANGOR, (new MyKad('720413-41-5315'))->stateName());
        $this->assertEquals(StateCode::SELANGOR, (new MyKad('720413-42-5315'))->stateName());
        $this->assertEquals(StateCode::SELANGOR, (new MyKad('720413-43-5315'))->stateName());
        $this->assertEquals(StateCode::SELANGOR, (new MyKad('720413-44-5315'))->stateName());

        $this->assertEquals(StateCode::TERENGGANU, (new MyKad('720413-11-5315'))->stateName());
        $this->assertEquals(StateCode::TERENGGANU, (new MyKad('720413-45-5315'))->stateName());
        $this->assertEquals(StateCode::TERENGGANU, (new MyKad('720413-46-5315'))->stateName());

        $this->assertEquals(StateCode::SABAH, (new MyKad('720413-12-5315'))->stateName());
        $this->assertEquals(StateCode::SABAH, (new MyKad('720413-47-5315'))->stateName());
        $this->assertEquals(StateCode::SABAH, (new MyKad('720413-48-5315'))->stateName());
        $this->assertEquals(StateCode::SABAH, (new MyKad('720413-49-5315'))->stateName());

        $this->assertEquals(StateCode::SARAWAK, (new MyKad('720413-13-5315'))->stateName());
        $this->assertEquals(StateCode::SARAWAK, (new MyKad('720413-50-5315'))->stateName());
        $this->assertEquals(StateCode::SARAWAK, (new MyKad('720413-51-5315'))->stateName());
        $this->assertEquals(StateCode::SARAWAK, (new MyKad('720413-52-5315'))->stateName());
        $this->assertEquals(StateCode::SARAWAK, (new MyKad('720413-53-5315'))->stateName());

        $this->assertEquals(StateCode::KUALA_LUMPUR, (new MyKad('720413-14-5315'))->stateName());
        $this->assertEquals(StateCode::KUALA_LUMPUR, (new MyKad('720413-54-5315'))->stateName());
        $this->assertEquals(StateCode::KUALA_LUMPUR, (new MyKad('720413-55-5315'))->stateName());
        $this->assertEquals(StateCode::KUALA_LUMPUR, (new MyKad('720413-56-5315'))->stateName());
        $this->assertEquals(StateCode::KUALA_LUMPUR, (new MyKad('720413-57-5315'))->stateName());

        $this->assertEquals(StateCode::LABUAN, (new MyKad('720413-15-5315'))->stateName());
        $this->assertEquals(StateCode::LABUAN, (new MyKad('720413-58-5315'))->stateName());

        $this->assertEquals(StateCode::PUTRAJAYA, (new MyKad('720413-16-5315'))->stateName());

        $this->assertEquals(StateCode::BRUNEI, (new MyKad('720413-60-5315'))->stateName());

        $this->assertEquals(StateCode::INDONESIA, (new MyKad('720413-61-5315'))->stateName());

        $this->assertEquals(StateCode::CAMBODIA, (new MyKad('720413-62-5315'))->stateName());

        $this->assertEquals(StateCode::LAOS, (new MyKad('720413-63-5315'))->stateName());

        $this->assertEquals(StateCode::MYANMAR, (new MyKad('720413-64-5315'))->stateName());

        $this->assertEquals(StateCode::PHILIPPINES, (new MyKad('720413-65-5315'))->stateName());

        $this->assertEquals(StateCode::SINGAPORE, (new MyKad('720413-66-5315'))->stateName());

        $this->assertEquals(StateCode::THAILAND, (new MyKad('720413-67-5315'))->stateName());

        $this->assertEquals(StateCode::VIETNAM, (new MyKad('720413-68-5315'))->stateName());

        $this->assertEquals(StateCode::BORN_OUTSIDE_MALAYSIA_PRIOR_TO_2001, (new MyKad('720413-71-5315'))->stateName());
        $this->assertEquals(StateCode::BORN_OUTSIDE_MALAYSIA_PRIOR_TO_2001, (new MyKad('720413-72-5315'))->stateName());

        $this->assertEquals(StateCode::CHINA, (new MyKad('720413-74-5315'))->stateName());

        $this->assertEquals(StateCode::INDIA, (new MyKad('720413-75-5315'))->stateName());

        $this->assertEquals(StateCode::PAKISTAN, (new MyKad('720413-76-5315'))->stateName());

        $this->assertEquals(StateCode::SAUDI_ARABIA, (new MyKad('720413-77-5315'))->stateName());

        $this->assertEquals(StateCode::SRI_LANKA, (new MyKad('720413-78-5315'))->stateName());

        $this->assertEquals(StateCode::BANGLADESH, (new MyKad('720413-79-5315'))->stateName());

        $this->assertEquals(StateCode::UNKNOWN_STATE, (new MyKad('720413-82-5315'))->stateName());

        $this->assertEquals(StateCode::ASIA_PACIFIC, (new MyKad('720413-83-5315'))->stateName());

        $this->assertEquals(StateCode::SOUTH_AMERICA, (new MyKad('720413-84-5315'))->stateName());

        $this->assertEquals(StateCode::AFRICA, (new MyKad('720413-85-5315'))->stateName());

        $this->assertEquals(StateCode::EUROPE, (new MyKad('720413-86-5315'))->stateName());

        $this->assertEquals(StateCode::BRITAIN, (new MyKad('720413-87-5315'))->stateName());

        $this->assertEquals(StateCode::MIDDLE_EAST, (new MyKad('720413-88-5315'))->stateName());

        $this->assertEquals(StateCode::FAR_EAST, (new MyKad('720413-89-5315'))->stateName());

        $this->assertEquals(StateCode::CARRIBEAN, (new MyKad('720413-90-5315'))->stateName());

        $this->assertEquals(StateCode::NORTH_AMERICA, (new MyKad('720413-91-5315'))->stateName());

        $this->assertEquals(StateCode::SOVIET_UNION, (new MyKad('720413-92-5315'))->stateName());

        $this->assertEquals(StateCode::OTHERS, (new MyKad('720413-93-5315'))->stateName());

        $this->assertEquals(StateCode::STATELESS, (new MyKad('720413-98-5315'))->stateName());

        $this->assertEquals(StateCode::UNSPECIFIED_NATIONALITY, (new MyKad('720413-99-5315'))->stateName());
    }

    public function testInputIsInvalid()
    {
        $this->expectException(InvalidLengthException::class);
        (new MyKad(7204133353))->isValid();

        $this->expectException(InvalidCharacterException::class);
        (new MyKad('AB0D13101221'))->isValid();

        $this->expectException(InvalidDateException::class);
        (new MyKad('AB0D13101221'))->isValid();
    }
}
