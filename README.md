# API com Lumen + Docker

### Configuração inicial
Criei o seu arquivo .env e coloque as informações necessárias. 
Nos dados do banco, coloque da seguinte maneira: 
```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=nome_do_db
DB_USERNAME=usuario
DB_PASSWORD=senha
```

### Instalação

Criando a imagem docker da aplicação
```
docker-compose build app
```

Subindo os containers para rodar a aplicação
```
docker-compose up -d
```
_A opção "-d" serve para indicar que os containers devem rodar em background_ 

Criação das tabelas do banco de dados **(somente para ambiente de desenvolvimento)** 
```
docker-compose exec app php artisan migrate
```
Populando o banco de dados **(caso os seeders forem criados)**
```
docker-compose exec app php artisan db:seed
```