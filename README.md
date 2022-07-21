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
  "resultado": 
  [
    {
      "id": 4,
      "titulo": "Sequel to The Legend of Zelda: Breath of the Wild",
      "descricao": "Return to Hyrule - and the skies above - in this first look at gameplay for the Sequel to the Legend of Zelda: Breath of the Wild, planned for release on #NintendoSwitch in 2022.",
      "videoid": "Pi-MRZBP91I"
    },

    {
      "id": 14,
      "titulo": "DOOM Eternal – Trailer Oficial de Lançamento",
      "descricao": "Há uma única forma de vida dominante nesse universo, e ela carrega uma espada da vingança com cano de aço. Tornem-se o Slayer e cacem os exércitos do Inferno nos confins mais remotos da Terra e além. A única coisa que eles temem... são VOCÊS.",
      "videoid": "4V2_IxmXtk8"
    },

    {
      "id": 24,
      "titulo": "Assassin's Creed Valhalla: Trailer Cinemático",
      "descricao": "As guerras começarão. Os reinos cairão. Esta é a era dos vikings.",
      "videoid": "TUbgBVTD7VI"
    }
  ]
}
```

`https://code-io-api.herokuapp.com/video/4`

```
{
  "resultado": 
  {
    "id": 4,
    "titulo": "Sequel to The Legend of Zelda: Breath of the Wild",
    "descricao": "Return to Hyrule - and the skies above - in this first look at gameplay for the Sequel to the Legend of Zelda: Breath of the Wild, planned for release on #NintendoSwitch in 2022.",
    "videoid": "Pi-MRZBP91I"
  }
}
```
