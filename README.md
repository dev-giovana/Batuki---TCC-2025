# 🎧 Batuki — Plataforma de Descoberta Musical

O **Batuki** é uma aplicação web voltada para **descoberta musical**, permitindo que usuários explorem playlists oficiais, gêneros musicais, idiomas, rankings e realizem pesquisas por músicas, álbuns e playlists públicas do Spotify.
O projeto foi desenvolvido com fins **acadêmicos e de portfólio**, respeitando integralmente as normas da **Spotify Web API**.
🔹 Foco em integração com API REST
🔹 Boas práticas de front-end e back-end
🔹 Projeto acadêmico (TCC) e de portfólio.
---

## 🚀 Funcionalidades

- 🎶 Playlists oficiais do Spotify por gênero musical
- 🌍 Playlists por idioma e país
- 📊 Rankings musicais
- 🔍 Pesquisa por:
  - Faixas
  - Álbuns
  - Playlists públicas
- ▶️ Prévia de músicas (quando disponível)
- 🔐 Sistema de autenticação de usuários
- 💻 Interface responsiva e organizada por seções

---

## 🛠️ Tecnologias Utilizadas

- **PHP**
- **HTML5**
- **CSS3**
- **JavaScript**
- **Spotify Web API**
- **Spotify Embed**
- **XAMPP (Ambiente Local)**
---

## 🔑 Integração com Spotify API

O projeto utiliza a **Spotify Web API** com autenticação via **Client Credentials Flow**, garantindo:

- Segurança
- Acesso apenas a dados públicos
- Conformidade com os termos de uso da API

---

## ⚠️ Limitações da Spotify Web API

### 🎵 Reprodução de músicas
- A API **não permite reprodução completa**
- Apenas prévias de até **30 segundos (`preview_url`)**
- Nem todas as faixas possuem prévia disponível

📌 **Solução adotada:**  
Uso de **Spotify Embed** para playlists oficiais, garantindo reprodução segura e legal.

---

### 🔒 Controle de playback
- Não é possível controlar reprodução do usuário
- Não é permitido criar ou modificar playlists
- Não há acesso a dados pessoais

Essas limitações são respeitadas intencionalmente no projeto.

---

## 🧠 Decisões Técnicas

O Batuki foi projetado como um **hub de descoberta musical**, não como substituto do Spotify.

As decisões técnicas priorizaram:
- Boas práticas de desenvolvimento
- Organização de código
- Performance
- Experiência do usuário
- Respeito a direitos autorais

---

## 📈 Possíveis Melhorias Futuras

- Paginação dinâmica de resultados
- Loading states (skeletons)
- Modularização do JavaScript
- Melhoria no tratamento de erros da API
- Componentização do front-end

---

## 👩‍💻 Status do Projeto

📌 **Concluído (versão inicial)**  
Aberto para melhorias e evolução contínua.

---

## 📄 Observação Legal

Este projeto utiliza apenas recursos oficiais disponibilizados pela Spotify Web API e Spotify Embed.  
Desenvolvido exclusivamente para fins acadêmicos e de portfólio.

---


## 📋 Pré-requisitos

Antes de começar, você vai precisar ter instalado na sua máquina:

* [XAMPP](https://www.apachefriends.org/pt_br/index.html)
* Um navegador web (Google Chrome, Edge, Firefox, etc.)
* Conta no Spotify Developer
---

## 🔑 Configuração da API do Spotify

1. Acesse o site do **Spotify for Developers**
2. Faça login com sua conta do Spotify
3. Crie um novo aplicativo
4. Anote:

   * `CLIENT_ID`
   * `CLIENT_SECRET`
5. Configure o **Redirect URI** (exemplo):

   ```
   http://localhost/batuki-tcc/
   ```

---

## 📥 Como baixar o projeto
1. Clique em **Code > Download ZIP**
2. Extraia a pasta do projeto

---

## 📂 Configurando o projeto no XAMPP

1. Abra o **XAMPP Control Panel**
2. Inicie os serviços:

   * Apache
   * MySQL
3. Copie a pasta do projeto para:

   ```
   C:/xampp/htdocs/
   ```
4. Renomeie a pasta para (opcional):

   ```
   batuki-tcc
   ```

---

## 🗄️ Configuração do Banco de Dados

O banco de dados deve ser configurado manualmente utilizando o **MySQL Workbench**.

### 1️⃣ Criar o banco de dados

1. Abra o **MySQL Workbench**
2. Conecte-se ao seu servidor MySQL
3. Crie um novo banco de dados com o nome:

   ```sql
   CREATE DATABASE db_batuki;
   ```

---

### 2️⃣ Criar as tabelas

1. No projeto, localize o arquivo de texto que contém o script SQL das tabelas (Pasta "sql")
2. Copie **todo o conteúdo** do arquivo de texto
3. Cole no MySQL Workbench, com o banco `db_batuki` selecionado
4. Execute o script para criar as tabelas

---

### 3️⃣ Configurar a conexão no projeto

1. No projeto, acesse o arquivo:

   ```
   config.php
   ```
2. Configure os dados de conexão com o banco:

```php
<?php
$host = 'localhost';
$db   = 'db_batuki';
$user = 'root';
$pass = '';
?>
```

3. Salve o arquivo

---

## 🔐 Configurando as credenciais do Spotify

No arquivo responsável pela autenticação da API, adicione suas credenciais:

```php
$client_id = 'SEU_CLIENT_ID';
$client_secret = 'SEU_CLIENT_SECRET';
````
---

## ▶️ Rodando o projeto

1. Com o Apache e MySQL ativos no XAMPP
2. Abra o navegador
3. Acesse:

   ```
   http://localhost/batuki-tcc
   ```
4. Pronto! O projeto estará rodando 🎉

---

## ✨ Autora

**Giovana Karolina**  
 TCC, Curso Técnico em Informatica para Internet, ETEC Professora Anna de Oliveira Ferraz - Araraquara
Projeto desenvolvido para fins acadêmicos.
