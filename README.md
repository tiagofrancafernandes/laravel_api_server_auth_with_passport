
# Servidor de provisão de dados à equipe de Ops

### Principais funções
- Prover API (Rest/Graphql)
- Executar jobs
- Dashboards programáticas
- Gerar relatórios
____

## Usando o Docker (para desenvolvimento)

Copiar o arquivo **`docker-compose.yml`** e a pasta **`webdevops_docker/`** que estão dentro do diretório **`_dev_dir/docker_files`** para a pasta raiz do projeto.

! **NÃO VERSIONAR NA RAIZ DO PROJETO**.

Se for preciso atualizar os mesmos, atualize dentro da pasta **`_dev_dir/docker_files`**.
____

## Chaves adicionais do **.env**
Salvar chaves adicionais *(personalizadas)* do *.env* no arquivo **`extend.env`** e ao criar um novo *.env* copiar com um **`cat extend.env >> .env`** que as chaves estarão no .env e as atualize conforme a necessidade.

Isso serve para que se por ventura criar uma nova variável de embiente não se esqueça de as adionar ao projeto após um clone.
____


## Pós clone:
<!-- //TODO Atualizar posteriormente -->

1 - Instalar as dependências:

 `composer install`

2 - Para corrigir alerta **`Key path "file:///app/storage/oauth-public.key" does not exist or is not readable`** *(não é erro, só está informando a ausência dos keys)* **[ ! EM DESENVOLVIMENTO ! ]** execute:

 `php artisan passport:keys`

 > **[!!!]** As chaves geradas em produção devem ser guardadas em segurança, elas servem para criptografar os tokens de autenticação.

3 - Para gerar um APP_KEY execute **[ ! EM DESENVOLVIMENTO ! ]** :

 `artisan key:generate`

> **[!!!]** Isso criará um *base64* APP_KEY no *.env*. O APP_KEY de produção devem ser guardadas em segurança, elas servem para criptografar as senhas e outras coisas que precisem de criptografia.


