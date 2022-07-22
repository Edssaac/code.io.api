<div align="center">
  <b>CODE.IO.API</b>
</div>


> DESCRIÇÃO DO PROJETO

Essa aplicação foi desenvolvida seguindo os príncipios da arquitetura REST e tem seu escopo voltado apenas para o estudo da técnica.<br>
Projeto de exemplo que consome a API: https://github.com/Edssaac/code.io <br>
A API tem como objetivo de uso conectar os usuários para que possam compartilhar vídeos relacionados a programação e tecnologia.<br>
Para informações sobre como usar a API leia abaixo ou acesse a documentação: [CODE.IO.API DOCS](https://github.com/Edssaac/code.io.api/blob/main/Docs/doc.txt)

<br>

URL base:\
https://code-io-api.herokuapp.com/

---

<div align="center">

| Verbo     | Caminho       | Ação  |
|:----------|:--------------|:------|
| POST      | /video        | cria um novo registro de vídeo                        |
| PUT       | /video/id     | atualiza um vídeo específico                          |
| DELETE    | /video/id     | deleta um vídeo específico                            |
| GET       | /video/id     | obtém as informações de um vídeo em específico        |
| GET       | /video        | obtém as informações de todos os vídeos registrados   |

</div>

---

#### Exemplos:

> `https://code-io-api.herokuapp.com/`

```
{
  "mensagem": "code.io.api",
  "versão": "1.0.0",
  "documentação": "https://github.com/Edssaac/code.io.api"
}
```

> `https://code-io-api.herokuapp.com/video`

```
{
    "resultado": [
        {
            "id": 4,
            "titulo": "A História da Internet - TecMundo",
            "descricao": "Bem vindos à história da origem da internet.",
            "videoid": "pKxWPo73pX0"
        },
        {
            "id": 14,
            "titulo": "Entenda: o que é tecnologia? – TecMundo",
            "descricao": "Quando você pensa em tecnologia, o que vem na sua cabeça? Pode ser aquele smartphone top de linha, um drone voando por aí ou aquele streaming que roda as suas séries favoritas. Isso não tá errado: é tudo tecnologia. Só que essa palavra vai muito além ",
            "videoid": "N6h4FIr3-Sk"
        },
        {
            "id": 24,
            "titulo": "Programação é a carreira mais fácil que existe",
            "descricao": "Quer aprender a programar comigo? Então dá uma olhada no meu Curso Desenvolvimento Web Full Stack: https://programadorbr.com/?src=ytprog... Este curso é ideal para quem quer sair do zero, aprender diversas tecnologias e fazer os seus primeiros projetos de n",
            "videoid": "1o-BgQKCwWk"
        },
        {
            "id": 34,
            "titulo": "A BASE PARA SABER ANTES DE PROGRAMAR!",
            "descricao": "Se você já ouviu por aí que é preciso estudar a BASE antes de programar esse vídeo é pra você. Nós mesmos no canal já falamos várias vezes sobre isso mas nunca explicamos o que seria esses fundamentos. Esse conteúdo pode ser um guia para quem quer c",
            "videoid": "BTENKdRVS2U"
        }
    ]
}
```

> `https://code-io-api.herokuapp.com/video/14`

```
{
    "resultado": {
        "id": 14,
        "titulo": "Entenda: o que é tecnologia? – TecMundo",
        "descricao": "Quando você pensa em tecnologia, o que vem na sua cabeça? Pode ser aquele smartphone top de linha, um drone voando por aí ou aquele streaming que roda as suas séries favoritas. Isso não tá errado: é tudo tecnologia. Só que essa palavra vai muito além ",
        "videoid": "N6h4FIr3-Sk"
    }
}
```
