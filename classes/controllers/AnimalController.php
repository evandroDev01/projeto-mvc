<?php

class AnimalController{

    function Listar()
    {
        $servidor = 'mysql:host=127.0.0.1;dbname=prontuario_vet';
        $usuario = 'root';
        $senha = 'matrix';
        
        $lista = [];
        try
        {
            $pdo = new PDO($servidor,$usuario,$senha);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql = $pdo->prepare('Select cd_animal,nm_animal,cd_especie from animal');
            $sql->execute();

            while($dados = $sql->fetch(PDO::FETCH_ASSOC))
            {

                $codigo = $dados['cd_animal'];
                $nome = $dados['nm_animal'];
                $codigoEspecie = $dados['cd_especie'];

                $animal = new Animal($codigo,$nome);
                array_push($lista,$animal);
            }
            
            $pdo = null;
        }
        catch(PDOException $e)
        {
            echo "Erro: ".$e->getMessage();
        }

        return $lista;

    }
}



?>