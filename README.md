
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

<!--
//TODO Atualizar posteriormente
## Pós clone:

1 - `composer install`

2 - `artisan key:generate`
-->
