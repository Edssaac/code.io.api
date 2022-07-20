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

`https://code-io-api.herokuapp.com/`

```
{
  "mensagem": "code.io.api",
  "versão": "1.0.0",
  "documentação": "https://github.com/Edssaac/code.io.api"
}
```

`https://code-io-api.herokuapp.com/video`

```
{

}
```

`https://code-io-api.herokuapp.com/video/3`

```
{

}
```
