<?php
    // Conexão com o banco de dados (substitua os valores conforme necessário)
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "sysbiblio";

    $conn = new mysqli($host, $username, $password, $database);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Consulta para obter aniversariantes do dia
    $hoje = date("m-d");
    $sql = "SELECT evento, dataevento FROM eventos WHERE DATE_FORMAT(dataevento, '%m-%d') = '$hoje' ORDER BY evento";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // echo "<strong>Datas Importantes</strong>";
        $atual = implode('/', array_reverse(explode('-', date('Y-m-d'))));
        echo '<strong>'.$atual.'</strong>';
        while ($row = $result->fetch_assoc()) {
            echo '<li>'.$row["evento"].'</li>';
        }
    } else {
        echo "Nenhum marco histórico para hoje.";
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
?>