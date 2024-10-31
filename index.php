<?php

// proviamo a creare il check di una password

//ALMENO UNA LETTERA MAIUSCOLA
//ALMENO 8 CARATTERI
//ALMENO UN NUMERO
//ALMENO UN CARATTERE SPECIALE

/*
visualizzare in console quale regola non e’ stata rispettata
HINT: intervenire in ogni funzione singola
*/


// data una password, devo controllare che abbia almeno 8 caratteri

function checkString ($password) {    
    if(strlen($password) >= 8) {
        return true;        
    }        
    echo "la password deve essere lunga minimo 8 caratteri \n";
    return false;    
}

// data una password, controllare che abbia almeno una lettera maiuscola
//dobbiamo ciclare ogni singola lettera della password e dare in pasto al ctype_upper ogni lettera

function checkUpperCase ($password) {    
    for ($i = 0; $i < strlen($password); $i++) {
        if(ctype_upper($password[$i]) == true) {
            return true;
        }        
    }
    echo "la password deve contenere almeno una lettera maiuscola\n";
    return false;
}

//ALMENO UN NUMERO

function checkNumber ($password){
    for ($i = 0; $i < strlen($password); $i++) {
        if(is_numeric($password[$i]) == true) {
            return true;
        }        
    }
    echo "la password deve contenere almeno un numero\n";
    return false;
}


//ALMENO UN CARATTERE SPECIALE

const SPECIAL_CHAR = [ "@" , "?" , "!" , "&" , "$" , "*" ];

function checkSpecialChar ($password) {
    for ($i = 0; $i < strlen($password); $i++) {
        if(in_array($password[$i], SPECIAL_CHAR) == true) {
            return true;
        }        
    }
    echo "la password deve avere almeno uno tra questi caratteri : @, ?, !, &, $, *\n";
    return false;
}

function checkPassword ($password) {
    $first_rule = checkString($password);
    $second_rule = checkUpperCase($password);
    $third_rule = checkNumber($password);
    $fourth_rule = checkSpecialChar($password);
    return $first_rule && $second_rule && $third_rule && $fourth_rule;
}

/* 
Implementare un metodo che faccia reinserire la password qualora anche una delle regole
non fosse rispettate e che, invece, lo interrompa in caso di password accettata
HINT: usare il do while
*/


do {
    $pwd = readline("Inserisci la tua password\n");
    $all_rules = checkPassword($pwd);
    if ($all_rules == true) {
        echo "Password accettata\n";
    } else {
        echo "Password rifiutata. Ritenta. \n";
    } 
} while (!$all_rules);
