<?php
use PHPUnit\Framework\TestCase;
require '../AppAdmin/EsilumBackEnd/modelos/UserModelo.class.php';

final class UsuarioModeloTests extends TestCase{
    public function testAutenticacionCorrecta(): void{
        try{
            $u = new UserModelo();
            $u -> id = "11111111";
            $u -> password = "1234";
            $u -> Autenticar();
            $this->assertTrue($u -> autenticado);
        }
        catch (Exception $e){
            $this->assertTrue(false);
        }
    }    
    public function testAutenticacionIncorrecta(): void{
        try{
            $u = new UserModelo();
            $u -> id = "88888888";
            $u -> password = "1234";
            $u -> Autenticar();
            $this->assertTrue(false);

        }
        catch (Exception $e){
            $this->assertTrue(true);
        }
    }  
}
