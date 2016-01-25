<?php

include_once '../Model/domeneModell.php';
include_once '../DAL/bankDatabaseStub.php';
include_once '../BLL/bankLogikk.php';

class bankLogikkTest extends PHPUnit_Framework_TestCase {
    
//start sjekkLoggInn($personnummer,$passord)

    function testStortPersonnummer() {
        $personnummer = "123456789012";
        $passord = "passord";
        $bank = new Bank(new DBStub());
        
        $result = $bank->sjekkLoggInn($personnummer, $passord);
        //$this->assertEquals($result, "Feil i personnummer");
    }
    
    function testLitePersonnummer() {
        $personnummer = "1234567890";
        $passord = "passord";
        $bank = new Bank(new DBStub());
        
        $result = $bank->sjekkLoggInn($personnummer, $passord);
        $this->assertEquals($result, "Feil i personnummer");
    }
    
    function testBokstaverIPersonnummer() {
        $personnummer = "1234567890a";
        $passord = "passord";
        $bank = new Bank(new DBStub());
        
        $resultat = $bank->sjekkLoggInn($personnummer, $passord);
        $this->assertEquals($resultat, "Feil i personnummer");
    }
    
    function testRiktigPersonnummer() {
        $personnummer = "12345678901";
        $passord = "passord";
        $bank = new Bank(new DBStub());
        
        $resultat = $bank->sjekkLoggInn($personnummer, $passord);
        $this->assertEquals($resultat, "OK");
    }



//end sjekkLoggInn($personnummer,$passord)

}