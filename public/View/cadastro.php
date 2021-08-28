<?php include_once('simple_header.php'); 

    $queryCurso = "SELECT * FROM Cursos";
    $resultCurso = runSQL($queryCurso);
    $optionCurso = '';
    while($rowCurso = mysqli_fetch_assoc($resultCurso)){
        $optionCurso .= '<option value='.$rowCurso['Codigo'].'>'.$rowCurso['Nome'].'</option>';
    }
?>
    <div class="container-fluid h-100 d-flex align-items-center">
        <div class="container-fluid ">
            <div class="row h-100 p-md-5 justify-content-center">
                <div class="col-sm-12 col-md-10 col-lg-6 col-xl-5 bg-princ-escuro h-100 rounded">
                    <div class="d-flex justify-content-around mt-2">
                        <div class="btn-group" role="group">
                            <button id="cadastroAluno" class="btn btn-success active p-3">Aluno</button>
                            <button id="cadastroProf" class="btn btn-success p-3">Professor</button>
                            <button id="cadastroCCP" class="btn btn-success p-3">CCP</button>
                        </div>
                    </div>
                    <div id="formAluno" class="d-flex justify-content-center pt-5 pb-5 h-100 p-sm-3 p-md-5">
                        <form class="w-100" method="POST" action="../index.php">
                            <label for="cadastroNumUsp" class="text-white">Número USP</label>
                            <input type="text"  class="form-control mb-4 p-4" name="cadastroNumUsp" id="cadastroNumUsp" placeholder="N° USP" required>

                            <label for="cadastroNome" class="text-white">Nome</label>
                            <input type="text"  class="form-control mb-4 p-4" name="cadastroNome" id="cadastroNome" placeholder="Nome" required>
                            
                            <label for="cadastroNome" class="text-white">Email</label>
                            <input type="email" class="form-control mb-4 p-4" name="cadastroEmail"  aria-describedby="emailHelp" placeholder="Email" required>
                            
                            <label for="cadastroCPF" class="text-white">CPF</label>
                            <input type="text"  class="form-control mb-4 p-4" name="cadastroCPF" id="cadastroCPF" placeholder="CPF" required>
                            
                            <label for="cadastroSenha" class="text-white">Senha</label>
                            <input type="password" class="form-control mb-4 p-4" name="cadastroSenha" id="cadastroSenha" aria-describedby="pwdHelp" placeholder="Senha" required>
                            
                            <label for="cadastroCurriculo" class="text-white">Link do currículo</label>
                            <input type="text"  class="form-control mb-4 p-4" name="cadastroCurriculo" id="cadastroCurriculo" placeholder="Link" required>
                            
                            <label for="cadastroCurso" class="text-white">Curso</label>
                            <select name="cadastroCurso" class="form-control mb-4" id="cadastroCurso">
                            <?php
                                echo $optionCurso;
                            ?>
                            </select>

                            <input type="submit" class="btn btn-primary p-3 float-right" name="CadastroAluno" value="Cadastrar">
                        </form>
                    </div>


                    <div id="formProfessor" class="d-none justify-content-center pt-5 pb-5 h-100 p-sm-3 p-md-5">
                        <form class="w-100" method="POST" action="../index.php">
                            <label for="cadastroNome" class="text-white">Nome</label>
                            <input type="text"  class="form-control mb-4 p-4" name="cadastroNome" id="cadastroNome" placeholder="Nome" required>
                            
                            <label for="cadastroNome" class="text-white">Email</label>
                            <input type="email" class="form-control mb-4 p-4" name="cadastroEmail"  aria-describedby="emailHelp" placeholder="Email" required>
                            
                            <label for="cadastroCPF" class="text-white">CPF</label>
                            <input type="text"  class="form-control mb-4 p-4" name="cadastroCPF" id="cadastroCPF" placeholder="CPF" required>
                            
                            <label for="cadastroSenha" class="text-white">Senha</label>
                            <input type="password" class="form-control mb-4 p-4" name="cadastroSenha" id="cadastroSenha" aria-describedby="pwdHelp" placeholder="Senha" required>
                            
                            <input type="submit" class="btn btn-primary p-3 float-right" name="cadastroProf" value="Cadastrar">
                        </form>
                    </div>


                    <div id="formCCP" class="d-none justify-content-center pt-5 pb-5 h-100 p-sm-3 p-md-5">
                        <form class="w-100" method="POST" action="../index.php">
                            <label for="cadastroCPF" class="text-white">CPF Professor</label>
                            <input type="text"  class="form-control mb-4 p-4" name="cadastroCPF" id="cadastroCPF" placeholder="CPF" required>
                            
                            <input type="submit" class="btn btn-primary p-3 float-right" name="cadastroCCP" value="Cadastrar">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="scripts/scritpCadastro.js"></script>
    
<?php include_once('footer.php');?>