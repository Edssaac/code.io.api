## Apresentação Geral

**Nome do Projeto:** code.io.api

**Descrição:**

A aplicação foi desenvolvida com base nos princípios da arquitetura REST, focando principalmente no estudo desta técnica. 
A API foi criada para conectar usuários interessados em compartilhar vídeos sobre programação e tecnologia. Um exemplo 
prático desse projeto pode ser visto em [code.io](https://github.com/Edssaac/code.io).

Para informações detalhadas sobre como utilizar a API, consulte a documentação disponível no seguinte link:

[![Documentação](https://img.shields.io/badge/Documentação-000000?style=for-the-badge&logo=markdown&logoColor=white)](https://github.com/Edssaac/code.io.api/tree/main/system/documentation)

**Objetivo:**

Implementar um modelo básico de API REST.

**Tecnologias Utilizadas:**

![DOCKER](https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=docker&logoColor=fff)
![COMPOSER](https://img.shields.io/badge/Composer-885630?style=for-the-badge&logo=composer&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MYSQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![YOUTUBE](https://img.shields.io/badge/YouTube_API-FF0000?style=for-the-badge&logo=youtube&logoColor=white)

## Para Desenvolvedores

Se você é um desenvolvedor interessado em contribuir ou entender melhor o funcionamento do projeto, aqui estão algumas informações adicionais:

**Ambiente:**

![PHP](https://img.shields.io/badge/PHP-8.4-777BB4?style=for-the-badge&logo=php)
![MYSQL](https://img.shields.io/badge/MySQL-8.0-005C84?style=for-the-badge&logo=mysql)

```sql
CREATE DATABASE IF NOT EXISTS `code_io`;

USE `code_io`;

CREATE TABLE IF NOT EXISTS `video` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(50) NOT NULL,
    `description` VARCHAR(500) NOT NULL,
    `videoid` VARCHAR(11) NOT NULL,
    PRIMARY KEY (`id`)
);
```

**Instruções de Instalação e Configuração:**

> Atenção: Obrigatório o uso de Docker em sua máquina.

1. Clone o repositório do projeto:
```
git clone https://github.com/edssaac/code.io.api
```

2. Navegue até o diretório do projeto:
```
cd code.io.api
```

3. Inicie a aplicação atráves do script que configura o Docker:
```
.ci_cd/init.sh  
```
Com isso a aplicação estará acessivel: [http://localhost:8080](http://localhost:8080)
> Confira a [Documentação](./system/documentation) para informações sobre o consumo da API.

---

4. Quando desejar encerrar a aplicação, use:
```
.ci_cd/stop.sh
```
Caso deseje encerrar e remover os volumes criados, use:
```
.ci_cd/stop.sh -v
```

## Contato

[![GitHub](https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white)](https://github.com/edssaac)
[![Gmail](https://img.shields.io/badge/Gmail-D14836?style=for-the-badge&logo=gmail&logoColor=white)](mailto:edssaac@gmail.com)
[![Outlook](https://img.shields.io/badge/Outlook-0078D4?style=for-the-badge&logo=microsoft-outlook&logoColor=white)](mailto:edssaac@outlook.com)
[![Linkedin](https://img.shields.io/badge/LinkedIn-black.svg?style=for-the-badge&logo=linkedin&color=informational)](https://www.linkedin.com/in/edssaac)
