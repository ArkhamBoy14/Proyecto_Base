--TEST--
Javascript Code with Scope: Unicode and embedded null in code string, empty scope
--XFAIL--
Embedded null in code string is not supported in libbson (CDRIVER-1879)
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$canonicalBson = hex2bin('1A0000000F61001200000005000000C3A9006400050000000000');
$canonicalExtJson = '{"a" : {"$code" : "\\u00e9\\u0000d", "$scope" : {}}}';

// Canonical BSON -> Native -> Canonical BSON 
echo bin2hex(fromPHP(toPHP($canonicalBson))), "\n";

// Canonical BSON -> Canonical extJSON 
echo json_canonicalize(toCanonicalExtendedJSON($canonicalBson)), "\n";

// Canonical extJSON -> Canonical BSON 
echo bin2hex(fromJSON($canonicalExtJson)), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
1a0000000f61001200000005000000c3a9006400050000000000
{"a":{"$code":"\u00e9\u0000d","$scope":{}}}
1a0000000f61001200000005000000c3a9006400050000000000
===DONE===