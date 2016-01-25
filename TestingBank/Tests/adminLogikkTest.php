<?php

include_once '../Model/domeneModell.php';
include_once '../BLL/adminLogikk.php';
include_once '../DAL/adminDatabase.php';

class adminLogikkTest extends PHPUnit_Framework_TestCase {
    
    //start hentAlleKunder()
    
    function testHentAlleKunder() {
        
        $adminDB = new Admin(new ADBstub());
        $kunde1 = new kunde();
        $kunde1->personnummer ="01010122344";
        $kunde1->navn = "Per Olsen";
        $kunde1->adresse = "Osloveien 82 0270 Oslo";
        $kunde1->telefonnr="12345678";
        $alleKunder[]=$kunde1;
        $kunde2 = new kunde();
        $kunde2->personnummer ="01010122344";
        $kunde2->navn = "Line Jensen";
        $kunde2->adresse = "Askerveien 100, 1379 Asker";
        $kunde2->telefonnr="92876789";
        $alleKunder[]=$kunde2;
        $kunde3 = new kunde();
        $kunde3->personnummer ="02020233455";
        $kunde3->navn = "Ole Olsen";
        $kunde3->adresse = "Bærumsveien 23, 1234 Bærum";
        $kunde3->telefonnr="99889988";
        
        $alleKunder = $adminDB->hentAlleKunder();
        $this->assertEquals($kunde1, $alleKunder[0]);
        $this->assertEquals($kunde2, $alleKunder[1]);
        $this->assertEquals($kunde3, $alleKunder[2]);
    }
    
    //end hentAlleKunder()
    
    //start endreKundeInfo()
    
    //tester på endring av navn
    function testEndreKundeInfo() {
        $adminDB = new Admin(new ADBstub());
        $kunde1 = new kunde();
        $kunde1->navn = "Ola Nordmann";
        $kunde1->adresse = "Osloveien 82 0270 Oslo";
        
        $result = $adminDB->endreKundeInfo($kunde1);
        
        $this->assertEquals("OK", $result);
    }
    
    //tester på ukjent adresse med kjent kunde
    function testEndreKundeInfo2() {
        $adminDB = new Admin(new ADBstub());
        $kunde1 = new kunde();
        $kunde1->navn = "Per Olsen";
        $kunde1->adresse = "Norgesgaten 11 0101 Oslo";
        
        $result = $adminDB->endreKundeInfo($kunde1);
        
        $this->assertEquals("OK", $result);
    }
    
    //tester på ukjent adresse med ny kunde
    function testEndreKundeInfo3() {
        $adminDB = new Admin(new ADBstub());
        $kunde1 = new kunde();
        $kunde1->navn = "Ola Nordmann";
        $kunde1->adresse = "Norgesgaten 11 0101 Oslo";
        
        $result = $adminDB->endreKundeInfo($kunde1);
        
        $this->assertEquals("Feil", $result);
    }
    
    //end endreKundeInfo()
    
    //start registrerKunde()
    
    //tester ny kunde med ny adresse
    function testRegistrerKunde() {
        $adminDB = new Admin(new ADBstub());
        $kunde1 = new kunde();
        $kunde1->navn = "Ola Nordmann";
        $kunde1->adresse = "Norgesgaten 11 0101 Oslo";
        
        $result = $adminDB->registrerKunde($kunde1);
        
        $this->assertEquals("OK", $result);
    }
    
    //tester eksisterende kunde med ny adresse
    function testRegistrerKunde1() {
        $adminDB = new Admin(new ADBstub());
        $kunde1 = new kunde();
        $kunde1->navn = "Ola Nordmann";
        $kunde1->adresse = "Osloveien 82 0270 Oslo";
        
        $result = $adminDB->registrerKunde($kunde1);
        
        $this->assertEquals("OK", $result);
    }
    
    function testRegistrerKunde2() {
        $adminDB = new Admin(new ADBstub());
        $kunde1 = new kunde();
        $kunde1->navn = "Per Olsen";
        $kunde1->adresse = "Osloveien 82 0270 Oslo";
        
        $result = $adminDB->registrerKunde($kunde1);
        
        $this->assertEquals("Feil", $result);
    }
    
    //end registrerKunde()
    
    //start slettKunde()
    
    //Tester riktig personnummer
    function testSlettKunde() {
        $adminDB = new Admin(new ADBstub());
        $kunde1 = new kunde();
        $kunde1->personnummer = "12345678901";
        
        $result = $adminDB->slettKunde($kunde1->personnummer);
        
        $this->assertEquals("OK", $result);
    }
    
    //Tester feil personnummer
    function testSlettKunde1() {
        $adminDB = new Admin(new ADBstub());
        $kunde1 = new kunde();
        $kunde1->personnummer = "12345678902";
        
        $result = $adminDB->slettKunde($kunde1->personnummer);
        
        $this->assertEquals("Feil", $result);
    }
    
    //end slettKunde()
    
    //start registrerKonto()
    
    //Tester en konto som skal gå igjennom
    function testRegistrerKonto() {
        
        $adminDB = new Admin(new ADBstub());
        $konto = new konto();
        $konto->personnummer = "12345678901";
        
        $result = $adminDB->registrerKonto($konto);
        
        $this->assertEquals("OK", $result);
    }
    
    //Tester en konto som ikke skal gå igjennom
    
    function testRegistrerKonto1() {
        
        $adminDB = new Admin(new ADBstub());
        $konto = new konto();
        $konto->personnummer = "12345678902";
        
        $result = $adminDB->registrerKonto($konto);
        
        $this->assertEquals("Feil", $result);
    }
    
    //end registrerKonto()
    
    //start endreKonto()
    
    //Tester en konto som skal gå igjennom
    function testEndreKonto() {
        $adminDB = new Admin(new ADBstub());
        $konto = new konto();
        $konto->personnummer = "12345678901";
        
        $result = $adminDB->endreKonto($konto);
        $this->assertEquals("OK", $result);
    }
    
    //Tester en konto som ikke skal gå igjennom
    function testEndreKonto1() {
        $adminDB = new Admin(new ADBstub());
        $konto = new konto();
        $konto->personnummer = "12345678902";
        
        $result = $adminDB->endreKonto($konto);
        $this->assertEquals("Feil", $result);
    }
    //End endreKonto()
    
    //start hentAlleKonti()
    
    function testHentAlleKonti() {
        $adminDB = new Admin(new ADBstub());
        $kunde = new kunde();
        $kunde->personnummer = "12345678901";
        $kunde1 = new kunde();
        $kunde->personnummer = "12345678902";
        $kunde2 = new kunde();
        $kunde->personnummer = "12345678903";
        $kunder = array($kunde, $kunde1, $kunde2);
        
        $result = $adminDB->hentAlleKonti();
        $this->assertEquals($kunder, $result);
    }
}