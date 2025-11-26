# 🗄️ API Cadastro43TI – PHP + MySQL

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![JSON](https://img.shields.io/badge/JSON-000000?style=for-the-badge&logo=json&logoColor=white)
![XAMPP](https://img.shields.io/badge/XAMPP-FB7A24?style=for-the-badge&logo=xampp&logoColor=white)
![ChatGPT 5.1](https://img.shields.io/badge/ChatGPT_5.1-00A67D?style=for-the-badge&logo=openai&logoColor=white)
![Gemini 3 Pro](https://img.shields.io/badge/Gemini_3_Pro-AUTO?style=for-the-badge&logo=google&logoColor=white)
![Antigravity](https://img.shields.io/badge/Antigravity_IDE-000000?style=for-the-badge&logo=visual-studio-code&logoColor=white)
![VSCode](https://img.shields.io/badge/VS_Code-007ACC?style=for-the-badge&logo=visual-studio-code&logoColor=white)

Este repositório contém a API **Cadastro43TI**, desenvolvida em PHP com PDO e MySQL, utilizada como backend do aplicativo Android **TestarAPI**:

📱 https://github.com/ricardaoquadros-jpg/testarAPI

O projeto foi criado no **Visual Code**, refinado com **ChatGPT 5.1**, e finalizado na **IDE Antigravity** com melhorias sugeridas pelo **Gemini 3 Pro**.

---

## 🎯 Objetivo da API

- 🔎 Buscar contatos  
- 📋 Listar registros  
- ➕ Criar novos contatos  
- ✏️ Atualizar informações  
- 🗑 Remover registros  
- 🔄 Respostas sempre em JSON  

---

## 🚀 Endpoints da API

### 📥 GET – Buscar contatos por nome

/view/read.php?nome=ricardo

Campos:
- nome  
- telefone  
- email  

### ✏️ PUT – Atualizar contato

/view/update.php

JSON esperado:
```json
{
  "id": "1",
  "nome": "Novo Nome",
  "telefone": "999999",
  "email": "email@exemplo.com"
}
```
###🗑 DELETE – Remover contato

/view/delete.php?id=1

## 📁 Estrutura do Projeto

```bash
/cadastro43TI
├─ model/
│  ├─ Contatos.class.php
│  ├─ conexao.class.php
├─ controller/
│  ├─ ContatosDAO.class.php
├─ view/
│  ├─ read.php
│  ├─ create.php
│  ├─ update.php
│  ├─ delete.php
│  ├─ form.html
│  └─ teste.php
└─ README.md
```
## 🧩 Arquitetura do Sistema
```mermaid
flowchart LR

    subgraph APP["📱 Android App (Java/Kotlin)"]
        A1["Volley HTTP Client"]
        A2["MainActivity / ListView"]
    end

    subgraph API["🖥 API PHP – cadastro43TI"]
        B1["read.php"]
        B2["create.php"]
        B3["update.php"]
        B4["delete.php"]
        B5["ContatosDAO (PDO)"]
    end

    subgraph DB["🗄 MySQL"]
        C1["Tabela: contatos"]
    end

    A1 --> B1 --> B5 --> C1
    A1 --> B2 --> B5 --> C1
    A1 --> B3 --> B5 --> C1
    A1 --> B4 --> B5 --> C1
```
```mermaid
erDiagram
    CONTATOS {
        INT id PK
        VARCHAR nome
        VARCHAR telefone
        VARCHAR email
    }
```
```mermaid
sequenceDiagram
    autonumber
    participant APP as Android
    participant VOLLEY as Volley
    participant API as PHP_API
    participant DAO as DAO
    participant DB as MySQL

    APP->>VOLLEY: Envia requisição
    VOLLEY->>API: GET / POST / PUT / DELETE
    API->>DAO: Chama método correspondente
    DAO->>DB: Executa SQL
    DB-->>DAO: Retorna dados
    DAO-->>API: Processa retorno
    API-->>VOLLEY: JSON final
    VOLLEY-->>APP: Resposta entregue
```
## 🧑‍💻 Autor

**Ricardo Quadros**  
- Estudante de Engenharia da Computação na UERGS  
- Técnico em Informática na Dr. Solon Tavares 
- Estagiário de Tecnologia e Informação – Prefeitura de Guaíba  
- Guaíba, RS – Brasil

---

## 📫 Contato

- GitHub: https://github.com/ricardaoquadros-jpg  
- Email: ricardaoquadros@gmail.com
- Linkedin: https://www.linkedin.com/in/ricardopquadros/



