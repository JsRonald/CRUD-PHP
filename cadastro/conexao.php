<?php
    $servidor ="localhost";
    $usuario = "root";
    $senha ="";
    $bd ="empresa";


    /* FUNÇÃO DO PROPRIO PHP PARA A CONEXÃO, QUE RETORNA SEMPRE VERDADEIRO OU FALSO*/
   
    $conexao = mysqli_connect($servidor, $usuario, $senha, $bd);

    if ($conexao)
    {
       /* echo "Conectado";*/
    }
    else
    {
        /*echo "Erro!";*/
    }
    function mensagem($texto, $tipo,$foto){
        echo"
        <center>
            <img style='width: 150px;height: 150px; border: 2px solid #d3d3d3; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1), 0 6px 20px rgba(0, 0, 0, 0.1);'src='../img/$foto' alt='Foto de perfil'>
            <div class='alert alert-$tipo' role='alert'>
                $texto
             </div>

        <center>";
    }


    function mostrar_data($data){
        $d= explode('-', $data);
        $escreve = $d[2] ."/" .$d [1] ."/".$d [0];
        return $escreve;

    }

    function mover_foto($vetor_foto){
        $arrayseparacao = explode('/',$vetor_foto['type']);
            $imagem= $arrayseparacao[0] ?? '';
            $tipoarquivo =$arrayseparacao[1] ?? '';

        if((!$vetor_foto['error']) and ($imagem == 'image')){            
            $nome_arquivo=date('Ymdhms').".". $tipoarquivo;
            move_uploaded_file($vetor_foto['tmp_name'],"../img/".$nome_arquivo);
            return $nome_arquivo;
        }
        else{
            return 0;
        }
    }

    function atualizar_foto($vetor_foto){
        $arrayseparacao = explode('/',$vetor_foto['type']);
        $imagem= $arrayseparacao[0] ?? '';
        $tipoarquivo =$arrayseparacao[1] ?? '';
        if((!$vetor_foto['error']) and ($imagem == 'image')){            
            $nome_arquivo=date('Ymdhms').".". $tipoarquivo;
            move_uploaded_file($vetor_foto['tmp_name'],"../img/".$nome_arquivo);
            return $nome_arquivo;
        }
        else{
            return 0;
        }
    }
?>

