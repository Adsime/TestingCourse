<?php

include_once '../Model/domeneModell.php';
include_once '../BLL/adminLogikk.php';

class ADBstub {
        
        function hentAlleKunder() {
           $alleKunder = array();
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
           $alleKunder[]=$kunde3;
           return $alleKunder;
        }
        
        function endreKundeInfo($kunde) {
            $kunde1 = new kunde();
            $kunde1->navn = "Per Olsen";
            $kunde1->adresse = "Osloveien 82 0270 Oslo";
            
            if($kunde1->adresse != $kunde->adresse and $kunde1->navn != $kunde->navn) {
                return "Feil";
            } 
            else {
                return "OK";
            }
        } 
        
        function registrerKunde($kunde) {
            $kunde1 = new Kunde();
            $kunde1->navn = "Per Olsen";
            $kunde1->adresse = "Osloveien 82 0270 Oslo";
            
            if($kunde1->adresse == $kunde->adresse and $kunde1->navn == $kunde->navn) {
                return "Feil";
            } 
            else {
                return "OK";
            }
        }
        
        function slettKunde($personnummer) {
            $kunde1 = new kunde();
            $kunde1->personnummer = "12345678901";
            
            if($personnummer == $kunde1->personnummer) {
                return "OK";
            }
            else {
                return "Feil";
            }
        }
        
        function registerKonto($konto) {
            $kunde = new kunde();
            $kunde->personnummer = "12345678901";
            
            if($kunde->personnummer == $konto->personnummer) {
                return "OK";
            } else {
                return "Feil";
            }
        }
        
        function endreKonto($konto) {
            $kunde = new kunde();
            $kunde->personnummer = "12345678901";
            
            if($kunde->personnummer == $konto->personnummer) {
                return "OK";
            } else {
                return "Feil";
            }  
        } 
        
        function hentAlleKonti() {
            $kunde = new kunde();
            $kunde->personnummer = "12345678901";
            $kunde1 = new kunde();
            $kunde->personnummer = "12345678902";
            $kunde2 = new kunde();
            $kunde->personnummer = "12345678903";
            $kunder = array($kunde, $kunde1, $kunde2);
            
            return $kunder;
        }
        
    }