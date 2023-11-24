<?php

namespace Shahonseven\MyKad\Enums;

enum StateCode: string
{
    case EMPTY = '';
    
    case JOHOR = 'Johor';

    case KEDAH = 'Kedah';

    case KELANTAN = 'Kelantan';

    case MALACCA = 'Melaka';

    case NEGERI_SEMBILAN = 'Negeri Sembilan';

    case PAHANG = 'Pahang';

    case PENANG = 'Pulau Pinang';

    case PERAK = 'Perak';

    case PERLIS = 'Perlis';

    case SELANGOR = 'Selangor';

    case TERENGGANU = 'Terengganu';

    case SABAH = 'Sabah';

    case SARAWAK = 'Sarawak';

    case KUALA_LUMPUR = 'Kuala Lumpur';

    case LABUAN = 'Labuan';

    case PUTRAJAYA = 'Putrajaya';

    case BRUNEI = 'Brunei';

    case INDONESIA = 'Indonesia';

    case CAMBODIA = 'Cambodia';

    case LAOS = 'Laos';

    case MYANMAR = 'Myanmar';

    case PHILIPPINES = 'Philippines';

    case SINGAPORE = 'Singapore';

    case THAILAND = 'Thailand';

    case VIETNAM = 'Vietnam';

    case BORN_OUTSIDE_MALAYSIA_PRIOR_TO_2001 = 'Born outside Malaysia prior to 2001';

    case CHINA = 'China';

    case INDIA = 'India';

    case PAKISTAN = 'Pakistan';

    case SAUDI_ARABIA = 'Saudi Arabia';

    case SRI_LANKA = 'Sri Lanka';

    case BANGLADESH = 'Bangladesh';

    case UNKNOWN_STATE = 'Unknown State';

    case ASIA_PACIFIC = 'Asia Pacific';

    case SOUTH_AMERICA = 'South America';

    case AFRICA = 'Africa';

    case EUROPE = 'Europe';

    case BRITAIN = 'Britain';

    case MIDDLE_EAST = 'Middle East';

    case FAR_EAST = 'Far East';

    case CARRIBEAN = 'Carribean';

    case NORTH_AMERICA = 'North America';

    case SOVIET_UNION = 'Soviet Union / USSR';

    case STATELESS = 'Stateless / Stateless Person Article 1/1954';

    case INVALID_STATE = 'Invalid State';

    case UNSPECIFIED_NATIONALITY = 'Unspecified Nationality';

    case OTHERS = 'Others';

}
