<?php

// 1. Simulação dos dados vindos do seu banco de dados.
// O terceiro campo aqui foi nomeado como 'nome'.
// 'id_chefia' igual a null ou 0 indica que é um departamento raiz.
$departamentos = [
    ['id' => '0', 'id_chefia' => '0', 'nome' => 'Diretoria Geral'],
    ['id' => '1', 'id_chefia' => '0',    'nome' => 'Departamento Jurídico'],
    ['id' => '2', 'id_chefia' => '0',    'nome' => 'Departamento Administrativo e Financeiro'],
    ['id' => '8', 'id_chefia' => '0',    'nome' => 'Gestão Administrativa'],
    ['id' => '4', 'id_chefia' => '1',    'nome' => 'Coordenação de Ações'],
    ['id' => '5', 'id_chefia' => '1',    'nome' => 'Coordenação de Prazos'],
    ['id' => '3', 'id_chefia' => '2',    'nome' => 'Coordenação Administrativa e Financeira'],
    ['id' => '7', 'id_chefia' => '3',    'nome' => 'TI'],
    ['id' => '21', 'id_chefia' => '3',    'nome' => 'Coordenação de Patrimônio'] 
];

/**
 * Função para hierarquizar os departamentos
 */
function construirArvore(array $elementos) {
    $arvore = [];
    $indexado = [];

    // Passo 1: Prepara o array e cria um índice baseado no ID
    foreach ($elementos as $elemento) {
        $elemento['subdepartamentos'] = []; // Cria o array que vai receber os filhos
        $indexado[$elemento['id']] = $elemento;
    }

    // Passo 2: Monta a hierarquia usando referências de memória (&$no)
    foreach ($indexado as $id => &$no) {
        echo '<pre>'.var_dump($no).'</pre>'; // Debug: mostra o conteúdo de $no
        $idChefia = $no['id_chefia'];

        // Se não tiver chefia (null ou 0), é o topo da hierarquia
        if (empty($idChefia)) {
            $arvore[] = &$no;
        } else {
            // Se tiver chefia, adiciona este departamento dentro do array de subdepartamentos do pai
            if (isset($indexado[$idChefia])) {
                $indexado[$idChefia]['subdepartamentos'][] = &$no;
            }
        }
    }

    return $arvore;
}

// 2. Executa a função
$departamentosHierarquizados = construirArvore($departamentos);

// 3. Converte para JSON
// JSON_PRETTY_PRINT formata o JSON com quebras de linha (bom para leitura)
// JSON_UNESCAPED_UNICODE preserva acentos (ex: "Informação" não vira "\u00e7\u00e3o")
$jsonOutput = json_encode($departamentosHierarquizados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

// 4. (Opcional) Define o cabeçalho para o navegador entender que é um JSON
header('Content-Type: application/json; charset=utf-8');

// 5. Imprime o resultado
echo $jsonOutput;

// 6. (Opcional) Salvar direto em um arquivo .json no servidor:
// file_put_contents('departamentos.json', $jsonOutput);

?>