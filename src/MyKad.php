<?php

namespace Shahonseven\MyKad;

use Carbon\Carbon;
use Carbon\Exceptions\InvalidArgumentException;
use Shahonseven\MyKad\Enums\Gender;
use Shahonseven\MyKad\Enums\StateCode;
use Shahonseven\MyKad\Exceptions\InvalidCharacterException;
use Shahonseven\MyKad\Exceptions\InvalidDateException;
use Shahonseven\MyKad\Exceptions\InvalidLengthException;

class MyKad
{
    /**
     * MyKad number
     * @var string $mykad
     */
    protected $mykad;

    public function __construct($mykad)
    {
        $this->mykad = (string) str_replace('-', '', $mykad);
    }

    /**
     * Get date of birth
     * @return Carbon
     * @throws InvalidArgumentException
     */
    public function dateOfBirth()
    {
        $dob = substr($this->mykad, 0, 6);
        $year = intval(substr($dob, 0, 2));
        $month = substr($dob, 2, 2);
        $day = substr($dob, 4, 2);

        $year += $year >= 50 ? 1900 : 2000;

        return Carbon::createFromDate($year, $month, $day);
    }

    /**
     * Get state name
     * @return mixed
     */
    public function stateName()
    {
        $this->isValid();

        $placeOfBirth = intval(substr($this->mykad, 6, 2));

        return match ($placeOfBirth) {
            0, 17, 18, 19, 20, 69, 70, 73, 80, 81, 94, 95, 96, 97 => StateCode::EMPTY,
            1, 21, 22, 23, 24, => StateCode::JOHOR,
            2, 25, 26, 27 => StateCode::KEDAH,
            3, 28, 29 => StateCode::KELANTAN,
            4, 30 => StateCode::MALACCA,
            5, 31, 59 => StateCode::NEGERI_SEMBILAN,
            6, 32, 33 => StateCode::PAHANG,
            7, 34, 35 => StateCode::PENANG,
            8, 36, 37, 38, 39 => StateCode::PERAK,
            9, 40 => StateCode::PERLIS,
            10, 41, 42, 43, 44 => StateCode::SELANGOR,
            11, 45, 46 => StateCode::TERENGGANU,
            12, 47, 48, 49 => StateCode::SABAH,
            13, 50, 51, 52, 53 => StateCode::SARAWAK,
            14, 54, 55, 56, 57 => StateCode::KUALA_LUMPUR,
            15, 58 => StateCode::LABUAN,
            16 => StateCode::PUTRAJAYA,
            60 => StateCode::BRUNEI,
            61 => StateCode::INDONESIA,
            62 => StateCode::CAMBODIA,
            63 => StateCode::LAOS,
            64 => StateCode::MYANMAR,
            65 => StateCode::PHILIPPINES,
            66 => StateCode::SINGAPORE,
            67 => StateCode::THAILAND,
            68 => StateCode::VIETNAM,
            71, 72 => StateCode::BORN_OUTSIDE_MALAYSIA_PRIOR_TO_2001,
            74 => StateCode::CHINA,
            75 => StateCode::INDIA,
            76 => StateCode::PAKISTAN,
            77 => StateCode::SAUDI_ARABIA,
            78 => StateCode::SRI_LANKA,
            79 => StateCode::BANGLADESH,
            82 => StateCode::UNKNOWN_STATE,
            83 => StateCode::ASIA_PACIFIC,
            84 => StateCode::SOUTH_AMERICA,
            85 => StateCode::AFRICA,
            86 => StateCode::EUROPE,
            87 => StateCode::BRITAIN,
            88 => StateCode::MIDDLE_EAST,
            89 => StateCode::FAR_EAST,
            90 => StateCode::CARRIBEAN,
            91 => StateCode::NORTH_AMERICA,
            92 => StateCode::SOVIET_UNION,
            93 => StateCode::OTHERS,
            98 => StateCode::STATELESS,
            99 => StateCode::UNSPECIFIED_NATIONALITY,
        };
    }

    /**
     * Get gender
     * @return Gender
     */
    public function gender()
    {
        $this->isValid();

        return substr($this->mykad, -1) % 2 ? Gender::MALE : Gender::FEMALE;
    }

    /**
     * Check if MyKad is valid
     * @return true
     * @throws InvalidLengthException
     * @throws InvalidCharacterException
     * @throws InvalidDateException
     */
    public function isValid()
    {
        if (strlen($this->mykad) !== 12) {
            throw new InvalidLengthException;
        }

        if (ctype_digit($this->mykad) === false) {
            throw new InvalidCharacterException;
        }

        try {
            $this->dateOfBirth();
        } catch (\Exception $e) {
            throw new InvalidDateException;
        }

        return true;
    }
}
