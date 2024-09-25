<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body>
    <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th scope="col">Título</th>
              <th scope="col">Editora</th>
              <th scope="col">Edição</th>
              <th scope="col">Ano Publicação</th>
              <th scope="col">Assunto</th>
              <th scope="col">Autor</th>
            </tr>
          </thead>
          @foreach ($report as $livro)
            <tr>
              <td>{{ livro.titulo }}</td>
              <td>{{ livro.editora }}</td>
              <td>{{ livro.edicao }}</td>
              <td>{{ livro.ano_publicacao }}</td>
              <td>
                <ul>
                  <li v-for="value in item.assuntos">
                    {{ value.descricao }}
                  </li>
                </ul>
              </td>
              <td>
                <ul>
                  <li v-for="value in item.autores">
                    {{ value.nome }}
                  </li>
                </ul>
              </td>
              
            </tr>
          </tbody>
          @endforeach
          <!--
          <tbody v-if="listaTodos == null || listaTodos.total == 0">
            <tr>
              <td class="alinhaCenter" colspan="7">
                Nenhum resultado encontrado!
              </td>
            </tr>
          </tbody>-->
        </table>
    </body>
</html>
