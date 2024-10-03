# Sistema de Biblioteca

Este é o projeto "Sistema de Biblioteca", desenvolvido com PHP com framework Laravel. O projeto é configurado para rodar em containers gerenciados pelo Podman.

## Tecnologias Utilizadas

- **Backend:** Laravel 11 PHP 8.2
- **Gerenciamento de Containers:** Podman
- **Serviços Incluídos:**
  - NGINX
  - MariaDB
  - PHP-FPM
    
## Estrutura de Arquivos Importantes

### `.env`

- Configurações de ambiente, como variáveis de banco de dados, definição de portas.

### `docker_compose.yml`

- Define os serviços utilizados, como PHP, NGINX e MariaDB.
- Configura volumes e redes para comunicação entre os serviços.

### `composer.json`

- Gerenciamento de dependências PHP.
- Scripts pós-instalação e pós-atualização para setup automático do ambiente.

### `Dockerfile`

- Instalação das dependências principais e configuração do ambiente PHP.
- Preparação do container para rodar a aplicação PHP com permissões adequadas.

## Como Rodar o Projeto

### Setup Inicial

1. Copie o arquivo `.env.example` para `.env` e configure-o conforme o ambiente necessário.
2. Execute os containers usando Podman com o Compose configurado, ajustando as permissões conforme necessárioD.

### Build e Execução

1. Utilize o comando abaixo para rodar os containers:

   - podman-compose up -d
   - Dentro do container php execute o composer i para instalar as dependências
