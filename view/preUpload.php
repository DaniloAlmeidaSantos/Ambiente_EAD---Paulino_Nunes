<?php
    session_start();
    require_once '../source/Models/Materias.php';
    $materia = new Materias();

    if (isset($_POST['btnPesquisar'])) {
        $materia->pesquisarMateria();
    } else {

    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../libs/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../libs/js/jquery.form.js"></script>
    <title>EAD - Upload</title>
</head>
<body>
    <h1>Preencha as informações requeridas</h1>
    <h4>
        <?php
            if (isset($_SESSION['error'])) {
                echo $_SESSION['error'];
            }
        ?>
    </h4>
    <form action="../source/includes/upload.php" method="post">
        <section id="Disciplina">
            <fieldset> <legend>Informações da atividade / video aula</legend>
                <input type="text" name="txtTitulo" placeholder="Título*..." required>
                <label> Disciplina:
                    <select name="selectDisciplina">
                        <option value="1">Matemática</option>
                        <option value="2">Português</option>
                        <option value="3">Sociologia</option>
                        <option value="4">História</option>
                        <option value="5">Geografia</option>
                        <option value="6">Filosofia</option>
                        <option value="7">Ed. Física</option>
                        <option value="8">Física</option>
                        <option value="9">Química</option>
                        <option value="7">Infomática</option>
                    </select>
                </label>
                <label>Escolha a série:
                    <select name="selectSerie">
                        <option value="1">3º ANO - ENSINO MÉDIO</option>
                        <option value="2">2º ANO - ENSINO MÉDIO</option>
                        <option value="3">1º ANO - ENSINO MÉDIO</option>
                        <option value="4">8º SÉRIE - ENSINO FUNDAMENTAL</option>
                        <option value="5">7º SÉRIE - ENSINO FUNDAMENTAL</option>
                        <option value="6">6º SÉRIE - ENSINO FUNDAMENTAL</option>
                        <option value="7">5º SÉRIE - ENSINO FUNDAMENTAL</option>
                        <option value="8">4º SÉRIE - ENSINO FUNDAMENTAL</option>
                        <option value="9">3º SÉRIE - ENSINO FUNDAMENTAL</option>
                        <option value="10">2º SÉRIE - ENSINO FUNDAMENTAL</option>
                        <option value="11">1º SÉRIE - ENSINO FUNDAMENTAL</option>
                    </select>
                </label>
                <br><br>
                <textarea name="txtDescDisciplina" cols="30" rows="10" maxlength="160" placeholder="Descrição da atividade / video aula (opcional)...."></textarea>
            </fieldset>
        </section>
        
        <section id="materia">
            <fieldset> 
                <legend>Informações da matéria</legend>

                <?php if (isset($_GET['pesquisa'])): ?>
                    <input type="text" name="txtNomeMateria" placeholder="Nome da matéria*..." required><br><br>
                    <textarea name="txtDescMateria" cols="30" rows="10" maxlength="160" placeholder="Descrição da matéria(opcional)...."></textarea>
                    <input type="hidden" name="addMateria" value="true">
                <?php else: ?>
                    <h2>Pesquise por uma matéria já existente</h2>
                    <input type="text" name="txtNomeMateria" autocomplete="false" id="txtPesquisar" placeholder="Nome da matéria*..." required><br>

                    <p>Quer adicionar uma nova matéria? <a href="?pesquisa=false">Clique aqui!</a></p>
                    <div id="resultado"></div>
                    <script src="../source/js/materias.js"></script>
                <?php endif;?>
            </fieldset>
        </section>

        <button type="submit" name="btnProsseguir">Prosseguir</button>

        <?php
            if (isset($_GET['voltar'])) {
                echo "<a href='../index.php'>Voltar</a>";
            }
        ?>
    </form>
    <footer><p>&copy; Copyrigth 2020 - Todos direitos reservados</p></footer>
    <script src="../source/ajax/pesquisaMaterias.js"></script>
</body>
</html>