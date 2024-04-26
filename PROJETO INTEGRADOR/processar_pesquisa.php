<?php
// Simulação de um banco de dados com uma lista de cards
$cards = [
    ['title' => 'Banco de Dados', 'description' => 'Gerencie suas informações.'],
    ['title' => 'Acessibilidade', 'description' => 'Melhore a experiência para todos.'],
    ['title' => 'Resolução de Problemas', 'description' => 'Encontre e corrija erros.'],
    ['title' => 'Sistema', 'description' => 'Crie seu próprio sistema.'],
    ['title' => 'Funcionalidade do Sistema', 'description' => 'Verifique o desempenho do sistema.'],
];

// Verificar se a busca foi feita
if (isset($_GET['query'])) {
    $query = htmlspecialchars($_GET['query']); // Tratar a entrada para segurança
    $query = strtolower($query); // Converter para minúsculas para busca case-insensitive
    
    // Filtrar cards que começam com a entrada do usuário
    $resultados = array_filter($cards, function($card) use ($query) {
        return strpos(strtolower($card['title']), $query) === 0; // Começa com as letras digitadas
    });

    // Exibir resultados como cards
    foreach ($resultados as $card) {
        echo '<div class="card mb-3">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $card['title'] . '</h5>';
        echo '<p class="card-text">' . $card['description'] . '</p>';
        echo '</div>';
        echo '</div>';
    }

    if (empty($resultados)) {
        echo '<p>Nenhum resultado encontrado para: ' . $query . '</p>';
    }
} else {
    echo '<p>Por favor, digite algo para buscar.</p>';
}
?>
