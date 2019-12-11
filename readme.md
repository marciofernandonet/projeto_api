## Projeto
 A API do projeto foi desenvolvido usando o Framework Laravel o Frontend foi construído com Bootstrap e Axios.

## Instalação e teste

1. Faça o clone do projeto;
2. Use o _Composer_ para baixar as dependências `composer update`;
3. Configure o acesso ao banco de dados no arquivo _.env_. Exemplo: 

```sql
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=api_rest
DB_USERNAME=root
DB_PASSWORD=
```
4. Execute o comando `php artisan migrate` para rodar as migrates;
5. Execute o comando `php artisan serve` para rodar o servidor de desenvolvimento, por padrão o servidor roda no endereço `http://localhost:8000`;

## Rotas das API

### Devedores:

- POST /devedores - `http://localhost:8000/api/devedores`

- GET /devedores - `http://localhost:8000/api/devedores`

- GET /devedores/{id} - `http://localhost:8000/api/devedores/{id}`

- PUT /devedores/{id} - `http://localhost:8000/api/devedores/{id}` 

- DELETE /devedor/{id} - `http://localhost:8000/api/devedores/{id}` 

### Dívidas:

- POST /dividas - `http://localhost:8000/api/dividas`. Exemplo:

```json
{
	"devedores_id": 1,
	"desc_titulo":	"Banco...",
	"valor": 500,
	"data_vencimento": "2019-12-28"
}
```

- GET /dividas/{id} - `http://localhost:8000/api/dividas/{id}`. O id é referente ao devedor.

### Busca por parâmetro:

- GET /devedores/find?: `http://localhost:8000/api/find?`. Exemplo: `http://localhost:8000/api/find?nome=Marcio`


