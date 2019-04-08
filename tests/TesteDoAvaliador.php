<?php
require "../Usuario.php";
require "../Lance.php";
require "../Leilao.php";
require "../Avaliador.php";

    class TesteDoAvaliador extends PHPUnit_Framework_TestCase {

        public function testAceitaLeilaoEmOrdemCrescente() {

            $joao = new Usuario("Joao");
            $renan = new Usuario("Renan");
            $felipe = new Usuario("Felipe");

            $leilao = new Leilao("Playstation 3");

            $leilao->propoe(new Lance($joao,250));
            $leilao->propoe(new Lance($renan,300));
            $leilao->propoe(new Lance($felipe,400));

            $leiloeiro = new Avaliador();
            $leiloeiro->avalia($leilao);

            $maiorEsperado = 400;
            $menorEsperado = 250;

            $this->assertEquals($maiorEsperado, $leiloeiro->getMaiorLance());
            $this->assertEquals($menorEsperado, $leiloeiro->getMenorLance());

        }

        public function testAceitaLeilaoEmOrdemCrescenteComOutrosValores() {

            $joao = new Usuario("Joao");
            $renan = new Usuario("Renan");
            $felipe = new Usuario("Felipe");

            $leilao = new Leilao("Playstation 3");

            $leilao->propoe(new Lance($joao,1000));
            $leilao->propoe(new Lance($renan,2000));
            $leilao->propoe(new Lance($felipe,3000));

            $leiloeiro = new Avaliador();
            $leiloeiro->avalia($leilao);

            $maiorEsperado = 3000;
            $menorEsperado = 1000;

            $this->assertEquals($maiorEsperado, $leiloeiro->getMaiorLance());
            $this->assertEquals($menorEsperado, $leiloeiro->getMenorLance());

        }

        public function testAceitaLeilaoComUmLance() {

            $joao = new Usuario("Joao");

            $leilao = new Leilao("Playstation 3");

            $leilao->propoe(new Lance($joao,250));

            $leiloeiro = new Avaliador();
            $leiloeiro->avalia($leilao);

            $maiorEsperado = 250;
            $menorEsperado = 250;

            $this->assertEquals($maiorEsperado, $leiloeiro->getMaiorLance());
            $this->assertEquals($menorEsperado, $leiloeiro->getMenorLance());
        }

        public function testPegaOsTresMaiores() {

            $joao = new Usuario("Joao");
            $renan = new Usuario("Renan");
            $felipe = new Usuario("Felipe");

            $leilao = new Leilao("Playstation 3");

            $leilao->propoe(new Lance($joao,250));
            $leilao->propoe(new Lance($renan,300));
            $leilao->propoe(new Lance($felipe,400));

            $leiloeiro = new Avaliador();
            $leiloeiro->avalia($leilao);

            $maiores = $leiloeiro->getTresMaiores();

            $this->assertEquals(3, count($maiores));
            $this->assertEquals(400, $maiores[0]->getValor());
            $this->assertEquals(300, $maiores[1]->getValor());
            $this->assertEquals(200, $maiores[2]->getValor());

        }
    }