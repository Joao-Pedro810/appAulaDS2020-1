<?php

    include('../../banco/conexao.php');

    if($conexao)
    {

        $requestData=$_REQUEST;

        $id=isset($requestData['idcategoria'])?$requestData['idcategoria']:''

        $sql="SELECT * FROM categorias WHERE idcategoria=$id";

        $resultado=mysqli_query($conexao, $sql); 

        if($resultado)
        {

            $dadosCategoria=array();
            while($linha=mysqli_fetch_assoc($resultado))
            {

                $dadosCategoria=array_map('utf8_encode', $linha)

            }


            $dados=array(
                "tipo"=>'success',
                "mensagem"=>'',
                "dados"=>$dadosCategoria
            )

        }
        else
        {

            $dados=array(
                "tipo"=>'info',
                "mensagem"=>'Não foi possível conectar ao banco de dados.',
                "dados"=>array()

            )

        }


    }


    echo json_encode($dados);


    else
    {

        $dados=array(
            "tipo"=>'info',
            "mensagem"=>'Não foi possível conectar ao banco de dados',
            "dados"=>array()
        )


    }


    echo json_encode($dados, JSON_UNDERSCARED_SLASHES, JSON_UNDERSCARED_UNICODE);