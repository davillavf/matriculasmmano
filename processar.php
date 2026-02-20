<?php
session_start();

if (
    empty($_SESSION['dados_pessoais']) ||
    empty($_SESSION['dados_socioeconomicos']) ||
    empty($_SESSION['dados_saude'])
) {
    die('Dados incompletos para salvar no banco.');
}

// Conexão banco
$host = 'localhost';
$db   = 'escola_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
} catch (PDOException $e) {
    die('Erro conexão banco: ' . $e->getMessage());
}

$dados = array_merge(
    $_SESSION['dados_pessoais'],
    $_SESSION['dados_socioeconomicos'],
    $_SESSION['dados_saude']
);

$campos_esperados = [
    'nome', 'nome_social', 'data_nascimento', 'cpf', 'rg', 'orgao_emissor', 'nacionalidade', 'naturalidade', 'mae', 'pai',
    'endereco', 'bairro', 'cidade', 'cep', 'telefone', 'email', 'escola_origem', 'ano_conclusao',
    'mora_com', 'qtd_moradores', 'irmaos', 'renda_fonte', 'renda_bruta', 'moradia', 'beneficio',
    'responsavel_trabalha', 'tem_computador', 'tem_internet', 'ajuda_estudo',
    'deficiencia', 'medicamentos', 'alergias', 'cirurgias', 'tratamento', 'laudos', 'atendimento_urgencia', 'uso_imagem'
];

foreach ($campos_esperados as $campo) {
    if (!isset($dados[$campo])) {
        $dados[$campo] = null;
    }
}

$sql = "INSERT INTO matriculas (
    nome, nome_social, data_nascimento, cpf, rg, orgao_emissor, nacionalidade, naturalidade, mae, pai,
    endereco, bairro, cidade, cep, telefone, email, escola_origem, ano_conclusao,
    mora_com, qtd_moradores, irmaos, renda_fonte, renda_bruta, moradia, beneficio,
    responsavel_trabalha, tem_computador, tem_internet, ajuda_estudo,
    deficiencia, medicamentos, alergias, cirurgias, tratamento, laudos, atendimento_urgencia, uso_imagem
) VALUES (
    :nome, :nome_social, :data_nascimento, :cpf, :rg, :orgao_emissor, :nacionalidade, :naturalidade, :mae, :pai,
    :endereco, :bairro, :cidade, :cep, :telefone, :email, :escola_origem, :ano_conclusao,
    :mora_com, :qtd_moradores, :irmaos, :renda_fonte, :renda_bruta, :moradia, :beneficio,
    :responsavel_trabalha, :tem_computador, :tem_internet, :ajuda_estudo,
    :deficiencia, :medicamentos, :alergias, :cirurgias, :tratamento, :laudos, :atendimento_urgencia, :uso_imagem
)";

$stmt = $pdo->prepare($sql);

try {
    $stmt->execute($dados);
    $ultimoId = $pdo->lastInsertId();

    session_destroy();

    header("Location: gerar_pdf.php?id=$ultimoId");
    exit;

} catch (PDOException $e) {
    die('Erro ao salvar no banco: ' . $e->getMessage());
}

