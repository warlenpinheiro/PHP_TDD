<?php
    use PHPUnit\Framework\TestCase;
    use Principal\Usuario;
    use Principal\Avaliador;
    use Principal\Leilao;
    use Principal\Lance;

    class TesteDeSaida extends TestCase {

        public function testExpectName(){
            $user = new Usuario('Warlen', 10);

            $this->expectOutputString('Warlen');

            echo $user->getNome();
        }
    }