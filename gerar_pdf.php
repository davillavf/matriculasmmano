<?php
require_once 'fpdf/fpdf.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('ID inválido.');
}

$id = (int) $_GET['id'];

// Conexão com banco
$pdo = new PDO("mysql:host=localhost;dbname=escola_db;charset=utf8mb4", "root", "", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$stmt = $pdo->prepare("SELECT * FROM matriculas WHERE id = ?");
$stmt->execute([$id]);
$dados = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$dados) {
    die("Registro não encontrado.");
}

function trata($txt) {
    return iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $txt);
}

// Criar PDF
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

if (file_exists('escola.png')) {
    $pdf->Image('escola.png', 80, 10, 50); // (arquivo, x, y, largura)
}
$pdf->Ln(35); 

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, trata('FICHA DE MATRÍCULA 2026'), 0, 1, 'C');
$pdf->Ln(3);

function secao($pdf, $titulo) {
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->SetFillColor(56, 183, 122);
    $pdf->SetTextColor(255);
    $pdf->Cell(190, 8, trata($titulo), 0, 1, 'L', true);
    $pdf->SetTextColor(0);
    $pdf->Ln(2);
}

function linhaCampo($pdf, $campo, $valor) {
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(60, 8, trata($campo . ':'), 0, 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(130, 8, trata($valor));
}

secao($pdf, '1. Dados Pessoais');
$dadosPessoais = [
    'Nome completo' => $dados['nome'],
    'Nome social' => $dados['nome_social'],
    'Data de nascimento' => $dados['data_nascimento'],
    'CPF' => $dados['cpf'],
    'RG' => $dados['rg'],
    'Órgão emissor' => $dados['orgao_emissor'],
    'Nacionalidade' => $dados['nacionalidade'],
    'Naturalidade' => $dados['naturalidade'],
    'Nome da mãe' => $dados['mae'],
    'Nome do pai' => $dados['pai'],
    'Endereço' => $dados['endereco'],
    'Bairro' => $dados['bairro'],
    'Cidade' => $dados['cidade'],
    'CEP' => $dados['cep'],
    'Telefone' => $dados['telefone'],
    'E-mail' => $dados['email'],
    'Escola de origem' => $dados['escola_origem'],
    'Ano conclusão EF' => $dados['ano_conclusao']
];
foreach ($dadosPessoais as $campo => $valor) {
    linhaCampo($pdf, $campo, $valor);
}
$pdf->Ln(2);

secao($pdf, '2. Questionário Socioeconômico');
$dadosSocio = [
    'Mora com' => $dados['mora_com'],
    'Qtd. moradores' => $dados['qtd_moradores'],
    'Número de irmãos' => $dados['irmaos'],
    'Fonte de renda' => $dados['renda_fonte'],
    'Renda familiar' => $dados['renda_bruta'],
    'Tipo de moradia' => $dados['moradia'],
    'Recebe benefício?' => $dados['beneficio'],
    'Responsável trabalha?' => $dados['responsavel_trabalha'],
    'Tem computador?' => $dados['tem_computador'],
    'Tem internet?' => $dados['tem_internet'],
    'Ajuda nos estudos?' => $dados['ajuda_estudo']
];
foreach ($dadosSocio as $campo => $valor) {
    linhaCampo($pdf, $campo, $valor);
}
$pdf->Ln(2);

secao($pdf, '3. Questionário de Saúde');
$dadosSaude = [
    'Possui deficiência?' => $dados['deficiencia'],
    'Medicamentos contínuos' => $dados['medicamentos'],
    'Alergias' => $dados['alergias'],
    'Cirurgias' => $dados['cirurgias'],
    'Tratamento médico' => $dados['tratamento'],
    'Laudos médicos?' => $dados['laudos'],
    'Autorização urgência' => $dados['atendimento_urgencia'],
    'Autorização imagem' => $dados['uso_imagem']
];
foreach ($dadosSaude as $campo => $valor) {
    linhaCampo($pdf, $campo, $valor);
}

$pdf->Ln(10);
$pdf->SetFont('Arial', 'I', 9);
$pdf->Cell(0, 10, trata('Documento gerado automaticamente pelo Sistema de Matrículas da EEEP Manoel Mano.'), 0, 1, 'C');

$pdf->Output();
?>

