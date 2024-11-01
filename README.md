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

![COMPOSER](https://img.shields.io/badge/Composer-885630?style=for-the-badge&logo=composer&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MYSQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![YOUTUBE](https://img.shields.io/badge/YouTube_API-FF0000?style=for-the-badge&logo=youtube&logoColor=white)

## Para Desenvolvedores

Se você é um desenvolvedor interessado em contribuir ou entender melhor o funcionamento do projeto, aqui estão algumas informações adicionais:

<br>

**Requisitos de Instalação:**

![COMPOSER](https://img.shields.io/badge/Composer-2.5.5-885630?style=for-the-badge&logo=composer)
![PHP](https://img.shields.io/badge/PHP-7.4.33-777BB4?style=for-the-badge&logo=php)

<br>

**Instruções de Instalação:**
1. Clone o repositório do projeto:
```
git clone https://github.com/edssaac/code.io.api
```

2. Navegue até o diretório do projeto:
```
cd code.io.api
```

3. Configure o Composer:
```
composer install
```

4. Configure o banco de dados:

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

5. Configure o .env com os dados necessários.

<br>

**Como Executar:**

Após concluir as etapas de instalação e configuração mencionadas acima, você está pronto para iniciar a aplicação. Siga os passos abaixo:

1. Como esta é uma aplicação simples, você pode usar o servidor embutido do PHP para servir a aplicação. <br>
Abra o terminal e execute o seguinte comando na raiz do projeto:
   ```
   php -S localhost:8080
   ```
   Isso iniciará um servidor local na porta 8080.

2. Uma vez que o servidor esteja em execução, abra seu Postman e acesse a seguinte URL:
   ```
   http://localhost:8080
   ```
   Confira a [Documentação](https://github.com/Edssaac/code.io.api/tree/main/system/documentation) para informações sobre o consumo da API.

Certifique-se de que o servidor PHP embutido esteja sempre em execução enquanto você estiver trabalhando na aplicação localmente. <br>
Se desejar encerrar o servidor, basta pressionar `ctrl + C` no terminal onde o servidor está sendo executado.

## Contato

[![GitHub](https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white)](https://github.com/edssaac)
[![Gmail](https://img.shields.io/badge/Gmail-D14836?style=for-the-badge&logo=gmail&logoColor=white)](mailto:edssaac@gmail.com)
[![Outlook](https://img.shields.io/badge/Outlook-0078D4?style=for-the-badge&logo=microsoft-outlook&logoColor=white)](mailto:edssaac@outlook.com)
[![Linkedin](https://img.shields.io/badge/LinkedIn-black.svg?style=for-the-badge&logo=linkedin&color=informational)](https://www.linkedin.com/in/edssaac)
