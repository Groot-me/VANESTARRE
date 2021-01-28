<?php

final class ControleurHelloworld
{
    public function defautAction() {
        $O_helloworld =  new Helloworld();

        Vue::montrer('helloworld/voir', array('helloworld' =>  $O_helloworld->donneMessage()));

    }

    public function testAction() {
        $O_helloworld =  new Helloworld();

        Vue::montrer('helloworld/voir', array('helloworld' =>  $O_helloworld->donneMessage()));

    }

}
