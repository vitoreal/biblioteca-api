<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
    <table width="100%" border-style="solid">
          <thead>
            <tr style="background-color: bisque; height: 30cm;">
              <th scope="col" style="padding: 10px;">Título</th>
              <th scope="col">Editora</th>
              <th scope="col">Edição</th>
              <th scope="col">Ano Publicação</th>
              <th scope="col">Assunto</th>
              <th scope="col">Autor</th>
              <th scope="col">Preço</th>
            </tr>
          </thead>
          <tbody>
          <?php

          foreach ($livros as $livro){
          ?>
            <tr style="background-color: #f2f2f2; border-bottom: 2px solid white;">
                <td><?php echo $livro['titulo']; ?></td>
                <td><?php echo $livro['editora']; ?></td>
                <td><?php echo $livro['edicao']; ?></td>
                <td><?php echo $livro['ano_publicacao']; ?></td>
                <td>
                <ul>
                <?php
                foreach ($livro['assuntos'] as $key => $assunto){
                    echo '<li>'.$assunto.'</li>';
                }
                ?>
                </ul>
                </td>
                <td>
                <ul>
                <?php
                foreach ($livro['autores'] as $key => $autor){
                    echo '<li>'.$autor.'</li>';
                }
                ?>
                </ul>
                </td>
                <td>R$ <?php echo $livro['valor']; ?></td>
            </tr>

            <?php
              }
            ?>

          </tbody>
        </table>
    </body>
</html>
