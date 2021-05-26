<?php
require 'vendor/autoload.php';

$client = new MongoDB\Client;

$dbms_project = $client->dbms_project;
$faculty = $dbms_project->faculty;


$doc = array(
    "_id" => "rpr001",
    "bio" => "I'm passionate",
    "education" => array("edu1", "edu2", "edu3"),
    "res_int" => "Data Structures, Algorithms",
    "project" => array("pro1", "pro2", "pro3"),
    "publication" => array("pub1", "pub2", "pub3"),
    "courses" => array("ML", "DataSc", "DSA")
);
$result = $faculty->insertOne($doc);

$doc = array(
    "_id" => "rpr002",
    "bio" => "I'm passionate",
    "education" => array("edu1", "edu2", "edu3"),
    "res_int" => "Data Structures, Algorithms",
    "project" => array("pro1", "pro2", "pro3"),
    "publication" => array("pub1", "pub2", "pub3"),
    "courses" => array("ML", "DataSc", "DSA")
);
$result = $faculty->insertOne($doc);

$doc = array(
    "_id" => "rpr003",
    "bio" => "I'm passionate",
    "education" => array("edu1", "edu2", "edu3"),
    "res_int" => "Data Structures, Algorithms",
    "project" => array("pro1", "pro2", "pro3"),
    "publication" => array("pub1", "pub2", "pub3"),
    "courses" => array("ML", "DataSc", "DSA")
);
$result = $faculty->insertOne($doc);

$doc = array(
    "_id" => "rpr004",
    "bio" => "I'm passionate",
    "education" => array("edu1", "edu2", "edu3"),
    "res_int" => "Data Structures, Algorithms",
    "project" => array("pro1", "pro2", "pro3"),
    "publication" => array("pub1", "pub2", "pub3"),
    "courses" => array("ML", "DataSc", "DSA")
);
$result = $faculty->insertOne($doc);

$doc = array(
    "_id" => "rpr005",
    "bio" => "I'm passionate",
    "education" => array("edu1", "edu2", "edu3"),
    "res_int" => "Data Structures, Algorithms",
    "project" => array("pro1", "pro2", "pro3"),
    "publication" => array("pub1", "pub2", "pub3"),
    "courses" => array("ML", "DataSc", "DSA")
);
$result = $faculty->insertOne($doc);

$doc = array(
    "_id" => "rpr006",
    "bio" => "I'm passionate",
    "education" => array("edu1", "edu2", "edu3"),
    "res_int" => "Data Structures, Algorithms",
    "project" => array("pro1", "pro2", "pro3"),
    "publication" => array("pub1", "pub2", "pub3"),
    "courses" => array("ML", "DataSc", "DSA")
);
$result = $faculty->insertOne($doc);

$doc = array(
    "_id" => "rpr007",
    "bio" => "I'm passionate",
    "education" => array("edu1", "edu2", "edu3"),
    "res_int" => "Data Structures, Algorithms",
    "project" => array("pro1", "pro2", "pro3"),
    "publication" => array("pub1", "pub2", "pub3"),
    "courses" => array("ML", "DataSc", "DSA")
);
$result = $faculty->insertOne($doc);

$doc = array(
    "_id" => "rpr008",
    "bio" => "I'm passionate",
    "education" => array("edu1", "edu2", "edu3"),
    "res_int" => "Data Structures, Algorithms",
    "project" => array("pro1", "pro2", "pro3"),
    "publication" => array("pub1", "pub2", "pub3"),
    "courses" => array("ML", "DataSc", "DSA")
);
$result = $faculty->insertOne($doc);

$doc = array(
    "_id" => "rpr009",
    "bio" => "I'm passionate",
    "education" => array("edu1", "edu2", "edu3"),
    "res_int" => "Data Structures, Algorithms",
    "project" => array("pro1", "pro2", "pro3"),
    "publication" => array("pub1", "pub2", "pub3"),
    "courses" => array("ML", "DataSc", "DSA")
);
$result = $faculty->insertOne($doc);

$doc = array(
    "_id" => "rpr010",
    "bio" => "I'm passionate",
    "education" => array("edu1", "edu2", "edu3"),
    "res_int" => "Data Structures, Algorithms",
    "project" => array("pro1", "pro2", "pro3"),
    "publication" => array("pub1", "pub2", "pub3"),
    "courses" => array("ML", "DataSc", "DSA")
);
$result = $faculty->insertOne($doc);

$doc = array(
    "_id" => "rpr011",
    "bio" => "I'm passionate",
    "education" => array("edu1", "edu2", "edu3"),
    "res_int" => "Data Structures, Algorithms",
    "project" => array("pro1", "pro2", "pro3"),
    "publication" => array("pub1", "pub2", "pub3"),
    "courses" => array("ML", "DataSc", "DSA")
);
$result = $faculty->insertOne($doc);

$doc = array(
    "_id" => "rpr012",
    "bio" => "I'm passionate",
    "education" => array("edu1", "edu2", "edu3"),
    "res_int" => "Data Structures, Algorithms",
    "project" => array("pro1", "pro2", "pro3"),
    "publication" => array("pub1", "pub2", "pub3"),
    "courses" => array("ML", "DataSc", "DSA")
);
$result = $faculty->insertOne($doc);

$doc = array(
    "_id" => "rpr013",
    "bio" => "I'm passionate",
    "education" => array("edu1", "edu2", "edu3"),
    "res_int" => "Data Structures, Algorithms",
    "project" => array("pro1", "pro2", "pro3"),
    "publication" => array("pub1", "pub2", "pub3"),
    "courses" => array("ML", "DataSc", "DSA")
);
$result = $faculty->insertOne($doc);

$doc = array(
    "_id" => "rpr014",
    "bio" => "I'm passionate",
    "education" => array("edu1", "edu2", "edu3"),
    "res_int" => "Data Structures, Algorithms",
    "project" => array("pro1", "pro2", "pro3"),
    "publication" => array("pub1", "pub2", "pub3"),
    "courses" => array("ML", "DataSc", "DSA")
);
$result = $faculty->insertOne($doc);

$doc = array(
    "_id" => "rpr015",
    "bio" => "I'm passionate",
    "education" => array("edu1", "edu2", "edu3"),
    "res_int" => "Data Structures, Algorithms",
    "project" => array("pro1", "pro2", "pro3"),
    "publication" => array("pub1", "pub2", "pub3"),
    "courses" => array("ML", "DataSc", "DSA")
);
$result = $faculty->insertOne($doc);

$doc = array(
    "_id" => "rpr016",
    "bio" => "I'm passionate",
    "education" => array("edu1", "edu2", "edu3"),
    "res_int" => "Data Structures, Algorithms",
    "project" => array("pro1", "pro2", "pro3"),
    "publication" => array("pub1", "pub2", "pub3"),
    "courses" => array("ML", "DataSc", "DSA")
);
$result = $faculty->insertOne($doc);

$doc = array(
    "_id" => "rpr017",
    "bio" => "I'm passionate",
    "education" => array("edu1", "edu2", "edu3"),
    "res_int" => "Data Structures, Algorithms",
    "project" => array("pro1", "pro2", "pro3"),
    "publication" => array("pub1", "pub2", "pub3"),
    "courses" => array("ML", "DataSc", "DSA")
);
$result = $faculty->insertOne($doc);

$doc = array(
    "_id" => "rpr018",
    "bio" => "I'm passionate",
    "education" => array("edu1", "edu2", "edu3"),
    "res_int" => "Data Structures, Algorithms",
    "project" => array("pro1", "pro2", "pro3"),
    "publication" => array("pub1", "pub2", "pub3"),
    "courses" => array("ML", "DataSc", "DSA")
);
$result = $faculty->insertOne($doc);

$doc = array(
    "_id" => "rpr019",
    "bio" => "I'm passionate",
    "education" => array("edu1", "edu2", "edu3"),
    "res_int" => "Data Structures, Algorithms",
    "project" => array("pro1", "pro2", "pro3"),
    "publication" => array("pub1", "pub2", "pub3"),
    "courses" => array("ML", "DataSc", "DSA")
);
$result = $faculty->insertOne($doc);

$doc = array(
    "_id" => "rpr020",
    "bio" => "I'm passionate",
    "education" => array("edu1", "edu2", "edu3"),
    "res_int" => "Data Structures, Algorithms",
    "project" => array("pro1", "pro2", "pro3"),
    "publication" => array("pub1", "pub2", "pub3"),
    "courses" => array("ML", "DataSc", "DSA")
);
$result = $faculty->insertOne($doc);

echo "Data Addition Successful.... Do not refresh this page or run this file again";

?>