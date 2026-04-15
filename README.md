# Sistema de Pontos para Vendedores

Sistema web desenvolvido para controle de pontos de vendedores com base em pedidos de vendas e resgate de produtos.

---

## 🛠️ Tecnologias utilizadas

- PHP (Laravel)
- MySQL
- Blade
- Tailwind CSS

---

## 🚀 Como rodar o projeto

### 1. Clonar o repositório

git clone URL_DO_SEU_REPOSITORIO  
cd NOME_DO_PROJETO

---

### 2. Instalar dependências

composer install  
npm install  

---

### 3. Configurar ambiente

Copie o arquivo de exemplo:

cp .env.example .env  

Abra o arquivo `.env` e configure o banco de dados:

DB_DATABASE=projeto  
DB_USERNAME=root  
DB_PASSWORD=  

---

### 4. Gerar chave da aplicação

php artisan key:generate  

---

### 5. Rodar migrations

php artisan migrate  

---

### 6. Criar usuário administrador

php artisan tinker  

Depois execute:

use App\Models\User;  
use Illuminate\Support\Facades\Hash;  

User::create([  
    'name' => 'Admin',  
    'email' => 'admin@email.com',  
    'password' => Hash::make('12345678'),  
    'role' => 'admin'  
]);  

---

### 7. Rodar o projeto

Em um terminal:

php artisan serve  

Em outro terminal:

npm run dev  

Acesse no navegador:

http://127.0.0.1:8000  

---

## 🔑 Credenciais de acesso

Administrador:

Email: admin@email.com  
Senha: 12345678  

---
