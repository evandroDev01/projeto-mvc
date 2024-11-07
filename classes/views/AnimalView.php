<?php

class AnimalView
{
    function ExibirTodosAnimal()
    {
        $animalController = new AnimalController();
        $listarAnimais = $animalController->Listar();

        foreach($listarAnimais as $object)
        {
            echo "<p>$object->Nome</p>";
        }

    }
}

?>