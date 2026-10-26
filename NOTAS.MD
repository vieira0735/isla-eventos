# NOTAS.md

## PL01 · Parte A: Onde está o quê

1. As rotas da aplicação web estão em `routes/web.php`.
2. As views estão em `resources/views`. A view da página de boas-vindas chama-se `welcome`.
3. O nome da base de dados está no `.env` (variável `DB_DATABASE`). Esse ficheiro não vai para o GitHub porque contém dados sensíveis e configuração local (passwords, `APP_KEY`).

## PL01 · Parte B: Rotas

**B2 · e()**
Com `e()`, `/ola/<h1>Ana` mostra o texto `<h1>Ana` tal como foi escrito. Sem `e()`, o browser interpreta o `<h1>` como HTML e mostra "Ana" em tamanho de título. É perigoso porque permite injectar HTML ou JavaScript na página (ataque XSS) e, por exemplo, roubar sessões de outros utilizadores.

**B5 · /dobro/abc**
Recebi o código **404**. O `whereNumber('numero')` faz a rota só corresponder a números, por isso com `abc` nenhuma rota corresponde.

**B6 · Erro de sintaxe**
Retirei o `;` e recebi o código **500**. A primeira linha do erro foi: **[confirma: copia a mensagem]**, na linha **[confirma: número]** do `routes/web.php`. Um 404 significa que o endereço não corresponde a nenhuma rota; um 500 significa que o código do servidor falhou, e a causa procura-se na mensagem de erro e em `storage/logs/laravel.log`.

## PL02 · Parte D: Detalhe

| Endereço | Estado |
|---|---|
| `/eventos/3` | 200 |
| `/eventos/99` | 404 |
| `/eventos/abc` | 404 |

`/eventos/abc` nem chega a entrar na função porque a rota tem `->whereNumber('id')`: o Laravel verifica a restrição antes de executar a função e, como `abc` não é um número, a rota não corresponde e responde logo 404.

## PL02 · Parte E: Filtro

- `/eventos?tipo=xpto`: nenhum evento tem esse tipo, por isso aparece a mensagem do `@empty`.
- `/eventos?tipo=<h1>x`: no código-fonte aparece `&lt;h1&gt;x`, ou seja, o `<h1>` é mostrado como texto, porque o `{{ }}` do Blade aplica `e()` automaticamente.
- Diferença entre query string e parâmetro de rota: o parâmetro de rota (`/eventos/{id}`) faz parte do caminho e identifica um recurso; a query string (`?tipo=workshop`) vem depois do `?`, é opcional, serve para filtrar e lê-se com `request('tipo')`.

## PL02 · Desafio: Próximos eventos

Sem `whereNumber('id')` e com `/eventos/{id}` escrita antes de `/eventos/proximos`, ao abrir `/eventos/proximos` o Laravel faria corresponder `proximos` a `{id}`, porque as rotas são avaliadas pela ordem em que estão escritas e ganha a primeira que corresponde. Como a função declara `int $id`, o PHP não consegue converter o texto `proximos` para inteiro e dá um erro de tipo (500). A rota `/eventos/proximos` nunca seria executada.

## PL03 · Desafio: eventos/tipo/{tipo}

A rota `/eventos/tipo/{tipo}` não entra em conflito com `/eventos/{id}` porque tem dois segmentos depois de `/eventos` e o `{id}` só corresponde a um segmento. Além disso, o `whereNumber('id')` rejeita texto, por isso `/eventos/tipo` nunca seria tomado como um id.