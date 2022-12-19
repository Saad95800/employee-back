<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Datatypes
 *
 * @ORM\Table(name="datatypes")
 * @ORM\Entity
 */
#[ApiResource]
class Datatypes
{
    /**
     * @var int
     *
     * @ORM\Column(name="INT_", type="integer", nullable=false, options={"default"="12"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $int = 12;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="TINY_INT", type="boolean", nullable=true, options={"default"="1"})
     */
    private $tinyInt = true;

    /**
     * @var int|null
     *
     * @ORM\Column(name="SMALL_INT", type="smallint", nullable=true, options={"default"="12"})
     */
    private $smallInt = '12';

    /**
     * @var int|null
     *
     * @ORM\Column(name="MEDIUM_INT", type="integer", nullable=true, options={"default"="123"})
     */
    private $mediumInt = 123;

    /**
     * @var int|null
     *
     * @ORM\Column(name="BIG_INT", type="bigint", nullable=true, options={"default"="123456"})
     */
    private $bigInt = '123456';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="BIT_", type="boolean", nullable=true)
     */
    private $bit;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="BOOL_", type="boolean", nullable=true)
     */
    private $bool;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="BOOLEAN_", type="boolean", nullable=true)
     */
    private $boolean;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DECIMAL_", type="decimal", precision=10, scale=2, nullable=true, options={"default"="14.55"})
     */
    private $decimal = '14.55';

    /**
     * @var string|null
     *
     * @ORM\Column(name="DEC_", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $dec;

    /**
     * @var string|null
     *
     * @ORM\Column(name="FIXED_", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $fixed;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NUMERIC_", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $numeric;

    /**
     * @var float|null
     *
     * @ORM\Column(name="FLOAT_", type="float", precision=10, scale=0, nullable=true, options={"default"="0.5"})
     */
    private $float = 0.5;

    /**
     * @var float|null
     *
     * @ORM\Column(name="DOUBLE_", type="float", precision=10, scale=0, nullable=true, options={"default"="0.3"})
     */
    private $double = 0.3;

    /**
     * @var float|null
     *
     * @ORM\Column(name="DOUBLE_PRECISION", type="float", precision=14, scale=5, nullable=true)
     */
    private $doublePrecision;

    /**
     * @var float|null
     *
     * @ORM\Column(name="REAL_", type="float", precision=11, scale=3, nullable=true)
     */
    private $real;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CHAR_", type="string", length=5, nullable=true, options={"default"="12345","fixed"=true})
     */
    private $char = '12345';

    /**
     * @var string|null
     *
     * @ORM\Column(name="NATIONAL_CHAR", type="string", length=5, nullable=true, options={"fixed"=true})
     */
    private $nationalChar;

    /**
     * @var string|null
     *
     * @ORM\Column(name="N_CHAR", type="string", length=5, nullable=true, options={"fixed"=true})
     */
    private $nChar;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VAR_CHAR", type="string", length=50, nullable=true, options={"default"="abc"})
     */
    private $varChar = 'abc';

    /**
     * @var string|null
     *
     * @ORM\Column(name="NATIONAL_VARCHAR", type="string", length=50, nullable=true)
     */
    private $nationalVarchar;

    /**
     * @var string|null
     *
     * @ORM\Column(name="N_VAR_CHAR", type="string", length=50, nullable=true)
     */
    private $nVarChar;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TEXT_", type="text", length=65535, nullable=true)
     */
    private $text;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TINY_TEXT", type="text", length=255, nullable=true)
     */
    private $tinyText;

    /**
     * @var string|null
     *
     * @ORM\Column(name="MEDIUM_TEXT", type="text", length=16777215, nullable=true)
     */
    private $mediumText;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LONG_TEXT", type="text", length=0, nullable=true)
     */
    private $longText;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_", type="date", nullable=true)
     */
    private $date;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="TIME_", type="time", nullable=true)
     */
    private $time;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_TIME", type="datetime", nullable=true)
     */
    private $dateTime;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="TIME_STAMP", type="datetime", nullable=true)
     */
    private $timeStamp;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="YEAR_4", type="date", nullable=true)
     */
    private $year4;

    /**
     * @var binary|null
     *
     * @ORM\Column(name="BINARY_", type="binary", nullable=true)
     */
    private $binary;

    /**
     * @var binary|null
     *
     * @ORM\Column(name="VAR_BINARY", type="binary", nullable=true, options={"default"="4564"})
     */
    private $varBinary = '4564';

    /**
     * @var string|null
     *
     * @ORM\Column(name="TINY_BLOB", type="blob", length=255, nullable=true)
     */
    private $tinyBlob;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LONG_BLOB", type="blob", length=0, nullable=true)
     */
    private $longBlob;

    /**
     * @var string|null
     *
     * @ORM\Column(name="MEDIUM_BLOB", type="blob", length=16777215, nullable=true)
     */
    private $mediumBlob;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ENUM_", type="string", length=0, nullable=true, options={"default"="cc"})
     */
    private $enum = 'cc';

    /**
     * @var array|null
     *
     * @ORM\Column(name="SET_", type="simple_array", length=0, nullable=true, options={"default"="b"})
     */
    private $set = 'b';

    /**
     * @var geometry|null
     *
     * @ORM\Column(name="GEOMETRY_", type="geometry", nullable=true)
     */
    private $geometry;

    /**
     * @var geometry_point|null
     *
     * @ORM\Column(name="POINT_", type="geometry_point", nullable=true)
     */
    private $point;

    /**
     * @var geometry_linestring|null
     *
     * @ORM\Column(name="LINE_STRING", type="geometry_linestring", nullable=true)
     */
    private $lineString;

    /**
     * @var geometry_polygon|null
     *
     * @ORM\Column(name="POLYGON_", type="geometry_polygon", nullable=true)
     */
    private $polygon;

    /**
     * @var geometry_collection|null
     *
     * @ORM\Column(name="GEOMETRY_COLLECTION", type="geometry_collection", nullable=true)
     */
    private $geometryCollection;

    /**
     * @var geometry_multipoint|null
     *
     * @ORM\Column(name="MULTI_POINT", type="geometry_multipoint", nullable=true)
     */
    private $multiPoint;

    /**
     * @var geometry_multilinestring|null
     *
     * @ORM\Column(name="MULTI_LINE_STRING", type="geometry_multilinestring", nullable=true)
     */
    private $multiLineString;

    /**
     * @var geometry_multipolygon|null
     *
     * @ORM\Column(name="MULTI_POLYGON", type="geometry_multipolygon", nullable=true)
     */
    private $multiPolygon;


}
