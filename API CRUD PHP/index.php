<?php
require_once "Person.php";

header("Content-Type:application/json");
$data=[];

$fn=$_REQUEST["fn"]??null;
$id=$_REQUEST["id"]??0;
$name=$_REQUEST["name"]??null;
$age=$_REQUEST["age"]??null;

$person=new Person;
$person->setId($id);

if($fn==="create" && $name !==null && $age !== null){
   $person->setName($name);
   $person->setAge($age);
    $data["person"]=$person->create();

}

if($fn==="read"){
    $data["person"]=$person->read();

}

if($fn==="update" &&  $id>0 && $name !==null && $age !== null){
    $person->setName($name);
    $person->setAge($age);
    $data["person"]=$person->update();

}

if($fn==="delete" &&  $id>0 ){
    $data["person"]=$person->delete();

}

die(json_encode($data));



