# Documentação - code.io.api

> Descrição

code.io.api é uma aplicação pessoal criada para estudo próprio, centrada na exploração e prática de conceitos de APIs RESTful. 
Além disso, a API facilita a conexão entre usuários interessados em compartilhar vídeos sobre programação e tecnologia.

## Campos

| Campo       | Descrição                                       | Restrições                                | Obrigatório em |
|-------------|-------------------------------------------------|-------------------------------------------|:--------------:|
| id          | Código de identificação do registro na API.     | Deve ser um número inteiro e positivo.    | PUT / DELETE   |
| title       | Nome do vídeo.                                  | Deve ter entre 5 e 50 caracteres.         | POST / PUT     |
| description | Descrição do vídeo.                             | Deve ter entre 10 e 500 caracteres.       | POST / PUT     |
| videoid     | ID do vídeo no YouTube.                         | Deve possuir 11 caracteres.               | POST / PUT     |

## URL Base
> Verifique se subiu nesta mesma porta, caso contrário, utilize a escolhida.

`http://localhost:8080/`

## Endpoints

#### POST `/video`
Cria um novo registro de vídeo.

---

#### GET `/video/:id`
Retorna um vídeo especificado pelo seu id.

#### GET `/video`
Retorna todos os vídeos registrados.

---

#### PUT `/video/:id`
Altera o registro de um vídeo especificado pelo seu id.

---

#### DELETE `/video/:id`
Deleta o registro de um vídeo especificado pelo seu id..
