<?php

final class Controleur
{
    private $_A_urlDecortique;
    private $_tab_Arg;



    public function __construct()
    {
        $arguments = func_get_args();
        $numberOfArguments = func_num_args();

        if (method_exists($this, $function = '__construct'.$numberOfArguments)) {
            call_user_func_array(array($this, $function), $arguments);
        }
    }

    public function __construct2($S_controleur, $S_action)
    {

        if (empty($S_controleur)) {
            // Nous avons pris le parti de préfixer tous les controleurs par "Controleur"
            $this->_A_urlDecortique['controleur'] = 'ControleurDefaut';
        } else {
            $this->_A_urlDecortique['controleur'] = 'Controleur' . ucfirst($S_controleur);
        }

        if (empty($S_action)) {
            // L'action est vide ! On la valorise par défaut
            $this->_A_urlDecortique['action'] = 'defautAction';
        } else {
            // On part du principe que toutes nos actions sont suffixées par 'Action'...à nous de le rajouter
            $this->_A_urlDecortique['action']  = $S_action . 'Action';
        }

    }
    public function __construct3($S_controleur, $S_action , $Tab_Arg)
    {
        if (empty($S_controleur)) {
            // Nous avons pris le parti de préfixer tous les controleurs par "Controleur"
            $this->_A_urlDecortique['controleur'] = 'ControleurDefaut';
        } else {
            $this->_A_urlDecortique['controleur'] = 'Controleur' . ucfirst($S_controleur);
        }

        if (empty($S_action)) {
            // L'action est vide ! On la valorise par défaut
            $this->_A_urlDecortique['action'] = 'defautAction';
        } else {
            // On part du principe que toutes nos actions sont suffixées par 'Action'...à nous de le rajouter
            $this->_A_urlDecortique['action']  = $S_action . 'Action';
        }

        $this->_tab_Arg = $Tab_Arg;
    }


    //On exécute
    public function executer()
    {
        //fonction de rappel de notre controleur cible (ControleurHelloworld pour notre premier exemple)
        call_user_func_array(array(new $this->_A_urlDecortique['controleur'], $this->_A_urlDecortique['action']) , $this->_tab_Arg );


    }



}

