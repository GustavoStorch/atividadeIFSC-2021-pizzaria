<?php

const SERVIDOR = "localhost:3306";

const BANCO = "pizzaria3";

const USUARIO = "root";

const SENHA = "gu19032002";

//include_once 'conexao.inc.php';

if (! isset($_POST['acao'])) {
    print json_encode(0);
    return;
}

switch ($_POST['acao']) {
    case 'buscar_pizza':
        $pizzas = new stdClass();
        $pizzas = json_decode($_POST['pizzas']);
        try {
            $sql = "select * from pizzas where codigo = ?";
            $conexao = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BANCO, USUARIO, SENHA);
            $pre = $conexao->prepare($sql);
            $pre->execute(array(
                $pizzas->codigo
            ));
            print json_encode($pre->fetchAll(PDO::FETCH_ASSOC));
        } catch (PDOException $e) {
            echo "Erro!: " . $e->getMessage() . "<br>";
            die();
        } finally {
            $conexao = null;
        }
        break;
    case 'listar_pizzas':
        try {
            $sql = "select * from pizzas";
            $conexao = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BANCO, USUARIO, SENHA);
            $pre = $conexao->prepare($sql);
            $pre->execute();
            print json_encode($pre->fetchAll(PDO::FETCH_ASSOC));
        } catch (PDOException $e) {
            echo "Erro!: " . $e->getMessage() . "<br>";
            die();
        } finally {
            $conexao = null;
        }
        break;
    case 'adicionar_pizzas':
        $pizzas = new stdClass();
        $pizzas = json_decode($_POST['pizzas']);
        try {
            $sql = "insert into pizzas(nome, descricao, valor) VALUES (?, ?, ?)";
            $conexao = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BANCO, USUARIO, SENHA);
            $pre = $conexao->prepare($sql);
            $pre->execute(array(
                $pizzas->nome,
                $pizzas->descricao,
                $pizzas->valor,
                $pizzas->codigo
            ));
            print json_encode($conexao->lastInsertId());
        } catch (PDOException $e) {
            echo "Erro!: " . $e->getMessage() . "<br>";
            die();
        } finally {
            $conexao = null;
        }
        break;
    case 'excluir_pizzas':
        $pizzas = new stdClass();
        $pizzas = json_decode($_POST['pizzas']);
        try {
            $sql = "delete from pizzas where id = ?";
            $conexao = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BANCO, USUARIO, SENHA);
            $pre = $conexao->prepare($sql);
            $pre->execute(array(
                $pizzas->codigo
            ));
            print json_encode(1);
        } catch (PDOException $e) {
            echo "Erro!: " . $e->getMessage() . "<br>";
            die();
        } finally {
            $conexao = null;
        }
        break;
    case 'editar_pizzas':
        $pizzas = new stdClass();
        $pizzas = json_decode($_POST['pizzas']);
        try {
            $sql = "update pizzas set nome = ?, descricao = ?, valor = ? where codigo = ?";
            $conexao = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BANCO, USUARIO, SENHA);
            $pre = $conexao->prepare($sql);
            $pre->execute(array(
                $pizzas->nome,
                $pizzas->descricao,
                $pizzas->valor,
                $pizzas->codigo
            ));
            print json_encode(1);
        } catch (PDOException $e) {
            echo "Erro!: " . $e->getMessage() . "<br>";
            die();
        } finally {
            $conexao = null;
        }
        break;
}
exit();

include_once 'rodape.php';
?>