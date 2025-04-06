# Teste Prático Laravel

## Como rodar a aplicação

1. Clone o repositório
```bash
git clone git@github.com:EduardoHoths/teste-pratico-laravel.git
```

2. Entre na pasta do projeto
```bash
cd teste-pratico-laravel
```

3. Suba os containers Docker
```bash
docker-compose up -d
```

4. Instale as dependências do projeto
```bash
docker-compose exec laravel composer install
```

5. Entre no container Laravel
```bash
docker exec -it laravel bash
```

6. Configure o banco de dados
```bash
php artisan migrate
```
Quando solicitado, selecione "yes" para criar o arquivo SQLite.

7. Acesse a aplicação
A aplicação estará disponível em: http://localhost:8000

