<?php
require_once('DBServices/DataBaseService.php');

class GetBanco //FIXME Esse getBanco ta muito ambiguo, o que é q isso faz exatamente?
{

    public function getAlunoFromFormulario($codigo){
        $query = "SELECT Numero_USP FROM formulario WHERE Codigo = $codigo";
        $result = runSQL($query);
        if($row = mysqli_fetch_assoc($result))
            return $row['Numero_USP'];
        return 'erro';
    }

    public function getProfFromAluno($codigo){
        $dados = [];
        $query = "SELECT CPF_Prof FROM professorresp WHERE Numero_USP = $codigo LIMIT 1";
        $result = runSQL($query);
        if($row = mysqli_fetch_assoc($result)) {
            $dados[] = $row['CPF_Prof'];

            $query = "SELECT Codigo FROM formulario WHERE Numero_USP = $codigo order by Data_Envio DESC";
            $result = runSQL($query);
            if ($row = mysqli_fetch_assoc($result)) {
                $dados[] = $row['Codigo'];
                return $dados;
            }
        }
        return 'erro';
    }

    public function getCCP(){
        $query = "SELECT CPF_prof FROM ccp";
        $result = runSQL($query);
        $cpf= [];
        while($row = mysqli_fetch_assoc($result))
            $cpf[] = $row['CPF_prof'];
        return $cpf;
    }

}