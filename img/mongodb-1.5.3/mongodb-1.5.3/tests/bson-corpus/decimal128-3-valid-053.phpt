--TEST--
Decimal128: [basx295] some more negative zeros [systematic tests below]
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$canonicalBson = hex2bin('18000000136400000000000000000000000000000036B000');
$canonicalExtJson = '{"d" : {"$numberDecimal" : "-0.00000"}}';
$degenerateExtJson = '{"d" : {"$numberDecimal" : "-0.00E-3"}}';

// Canonical BSON -> Native -> Canonical BSON 
echo bin2hex(fromPHP(toPHP($canonicalBson))), "\n";

// Canonical BSON -> Canonical extJSON 
echo json_canonicalize(toCanonicalExtendedJSON($canonicalBson)), "\n";

// Canonical extJSON -> Canonical BSON 
echo bin2hex(fromJSON($canonicalExtJson)), "\n";

// Degenerate extJSON -> Canonical BSON 
echo bin2hex(fromJSON($degenerateExtJson)), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
18000000136400000000000000000000000000000036b000
{"d":{"$numberDecimal":"-0.00000"}}
18000000136400000000000000000000000000000036b000
18000000136400000000000000000000000000000036b000
===DONE===