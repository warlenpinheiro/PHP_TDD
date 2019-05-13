<?php
    use PHPUnit\Framework\TestCase;
    use Principal\Usuario;
    use Principal\Avaliador;
    use Principal\Leilao;
    use Principal\Lance;

    class TesteDeInclusao extends TestCase {


    	/**
    	* @expectedException \PHPUnit\Framework\Error\Error
    	*/

    	public function testFalhaNoInclude(){
    		include 'config.php';
    	}

    	public function testExistsFile(){
    		$this->assertTrue(
    			file_exists('Lance.php')
    		);
    	}
    }