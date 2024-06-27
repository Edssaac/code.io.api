# Documentação da API code.io.api

## Descrição
**code.io.api** é uma aplicação de estudo baseada em RESTful. Seu objetivo é conectar usuários para que possam compartilhar vídeos relacionados à programação. Este é apenas um simples e iniciante projeto de estudos.

## Campos
- **id**: código de identificação do vídeo registrado na API
- **titulo**: nome do vídeo
- **descricao**: descrição do vídeo
- **videoid**: id do vídeo do YouTube

## Validação
- **id**: > 0 (maior que zero)
- **titulo**: entre 5 e 50 caracteres
- **descricao**: entre 10 e 350 caracteres
- **videoid**: não pode estar vazio e deve conter até 11 caracteres

## URL Base
`https://code-io-api.herokuapp.com/`

## Endpoints

#### POST `/video`
Cria um novo registro de vídeo.

#### PUT `/video/:id`
Altera o registro de um vídeo.

#### DELETE `/video/:id`
Deleta o registro de um vídeo.

#### GET `/video/:id`
Retorna um vídeo registrado pelo seu id.

#### GET `/video`
Retorna todos os vídeos registrados.