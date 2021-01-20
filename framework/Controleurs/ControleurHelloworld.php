<?php

final class ControleurHelloworld
{
    public function defautAction()
    {
        $O_helloworld =  new Helloworld();

        Vue::montrer('Views/voir', array('Views' =>  $O_helloworld->donneMessage()));

    }



}
