<?php 
class usuarios{
    private $dados=array();

    public function todos(){
        $con = mysqli_connect("localhost", "root", "");
        $banco = mysqli_select_db($con, "dsw");
         $sql = "SELECT * FROM usuarios;";
        $res = mysqli_query($con, $sql);
        $vetor = array();
        if($res){
            while($reg = mysqli_fetch_assoc($res)){
                    array_push($vetor, array('id'=>$reg['id'], 'nome' => $reg['nome'], 'email' => $reg['email'], 'senha' => $reg['senha'], 
                                            'dataNasc' => $reg['dataNasc'], 'tel' => $reg['tel'],'telRes' => $reg['telRes'], 
                                            'sexo' => $reg['sexo'], 'estadoCivil' => $reg['estadoCivil'], 'endereco' => $reg['endereco']));
            }
    }
        $data=$vetor;
        return $data;
    }
    public function ver($id){
        $con = mysqli_connect("localhost", "root", "");
        $banco = mysqli_select_db($con, "dsw");
        $sql = "SELECT * FROM usuarios WHERE id='".$id."';";
        $res = mysqli_query($con, $sql);
        if($res){
            $vetor = mysqli_fetch_assoc($res); 
        }
        
        $data = $vetor;
        return $data;
    }

    public function atualizarBanco(){


       
        // $this->view=new View;
        // $this->view->vaipraoutroview(); 
    }


}
?>