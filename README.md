## Sobre CRUD PHP

Esta aplicação tem por funcionalidade gerenciar cadastros de pessoas e categorias.

## Passos para a instalação

- Crie uma base de dados na máquina que irá instalar e nomeie como Laravel (necessário permissão de usuário);
- Entre no diretório que foi clonado (cd CRUDLARAVEL8);
- Rode o comando composer install para instalar todas as dependencias;
- Renomeie com o comando cp .env.example .env o arquivo de configuração de exemplo;
- Ajuste as informações de acesso da maquina que foi instalado, com o comando sudo nano .env:

DB_CONNECTION=mysql <br>
DB_HOST=127.0.0.1 <br>
DB_PORT=3306 <br>
DB_DATABASE=laravel //nome sugerido do banco de dados <br>
DB_USERNAME=root    //nome do usuario local com permissões <br>
DB_PASSWORD=        //senha do usuario local com permissões <br>
- Salve o arquivo e feche-o;

- Gere a chave de instalação da aplicação com este comando: php artisan key:generate;
- Rode o comando php artisan migrate --seed para criação da base e população dos dados;
- Use o comando php artisan serve para iniciar a aplicação;

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
