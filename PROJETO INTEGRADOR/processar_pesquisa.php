<?php
// Função para simular dados
function getData() {
    return [
        ['id' => 1, 'title' => 'Sistema de Gerenciamento', 'description' => 'Gerencie seu sistema facilmente.'],
        ['id' => 2, 'title' => 'Relatórios e Estatísticas', 'description' => 'Obtenha relatórios detalhados.'],
        ['id' => 3, 'title' => 'Banco de Dados', 'description' => 'Acesse dados com facilidade.']
    ];
}

// Obter a consulta de busca
$query = $_GET['query'] ?? '';

// Fazer busca nos dados simulados
$resultados = array_filter(getData(), function ($item) use ($query) {
    return stripos($item['title'], $query) !== false || stripos($item['description'], $query) !== false;
});

// Exibir resultados
if (empty($resultados)) {
    echo "<p>Nenhum resultado encontrado para '{$query}'</p>";
} else {
    foreach ($resultados as $resultado) 
    {
        echo "<div class='card mb-3'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>{$resultado['title']}</h5>";
        echo "<p class='card-text'>{$resultado['description']}</p>";
        echo "</div>";
        echo "</div>";
    }
}
?>
