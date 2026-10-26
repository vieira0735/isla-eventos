# NOTAS.md

## PL01 · Parte A: Onde está o quê

1. As rotas da aplicação web estão em `routes/web.php`.
2. As views estão em `resources/views`. A view da página de boas-vindas chama-se `welcome` (ficheiro `welcome.blade.php`).
3. O nome da base de dados está no ficheiro `.env` (variável `DB_DATABASE`). Esse ficheiro não vai para o GitHub porque contém configuração local e dados sensíveis (passwords, `APP_KEY`), que não devem ficar públicos.

## PL01 · Parte B: Rotas

**B2 · e() e `/ola/<h1>Ana`**
Com `e()`, o browser mostra o texto `<h1>Ana` tal como foi escrito, porque os caracteres `<` e `>` são convertidos em entidades HTML. Sem `e()`, o browser interpreta o `<h1>` como HTML e mostra "Ana" em tamanho de título. Isto é perigoso porque permite injectar HTML ou JavaScript na página (ataque XSS) e, por exemplo, roubar sessões de outros utilizadores.

**B5 · `/dobro/abc`**
Recebi o código de estado **404**. O `whereNumber('numero')` faz a rota só corresponder a números, por isso com `abc` nenhuma rota corresponde.

**B6 · Erro de sintaxe**
Ao retirar o `;` de uma rota recebi o código **500**. A primeira linha do erro foi: **[PREENCHER: copia a mensagem, por exemplo "syntax error, unexpected token ..."]**, na linha **[PREENCHER: número da linha]** de `routes/web.php`. Um 404 significa que o endereço não corresponde a nenhuma rota (o problema está no pedido); um 500 significa que o código do servidor falhou, e a causa procura-se na mensagem de erro e em `storage/logs/laravel.log`.

## PL02 · Parte D: Detalhe

| Endereço | Código de estado |
|---|---|
| `/eventos/3` | 200 |
| `/eventos/99` | 404 |
| `/eventos/abc` | 404 |

`/eventos/abc` nem chega a entrar na função porque a rota tem `->whereNumber('id')`. O Laravel verifica essa restrição antes de executar a função: como `abc` não é um número, a rota não corresponde ao pedido e responde logo 404.

## PL02 · Parte E: Filtro pelo endereço

- `/eventos?tipo=xpto`: nenhum evento tem esse tipo, o array fica vazio e aparece a mensagem do `@empty` ("Não há eventos para mostrar.").
- `/eventos?tipo=<h1>x`: no código-fonte (Ctrl+U) aparece `&lt;h1&gt;x`, ou seja, o `<h1>` é mostrado como texto e não como HTML, porque o `{{ }}` do Blade aplica `e()` automaticamente.
- **Query string vs parâmetro de rota:** o parâmetro de rota (`/eventos/{id}`) faz parte do caminho e identifica um recurso concreto. A query string (`?tipo=workshop`) vem depois do `?`, é opcional, serve para filtrar ou ordenar, e lê-se com `request('tipo')` ou `$request->query('tipo')`.

## PL02 · Desafio: Próximos eventos

Se `/eventos/{id}` não tivesse `whereNumber('id')` e estivesse escrita antes de `/eventos/proximos`, ao abrir `/eventos/proximos` o Laravel faria corresponder `proximos` ao parâmetro `{id}`, porque as rotas são avaliadas pela ordem em que estão escritas e ganha a primeira que corresponde. Como a função declara `int $id`, o texto `proximos` não pode ser convertido para inteiro e dá erro de tipo. A rota `/eventos/proximos` nunca seria executada. Por isso as rotas específicas têm de vir antes das que têm parâmetros.~

## PL03 · Controllers, rotas com nome e GitHub

- **O que ganhei em tirar a lógica das rotas:** o `routes/web.php` ficou com poucas linhas e só diz que URL vai para que controller. A lógica passou para os controllers, o que torna o código mais organizado e fácil de manter. Os dados ficaram em `config/eventos.php`, por isso, quando houver base de dados, só os controllers mudam.
- **Método `private` e rotas:** um método `private` (como `procurar()`) só pode ser chamado dentro da própria classe. Uma rota precisa de chamar o método a partir de fora, por isso tem de ser `public`.
- **Rota sem nome e `route('eventos.show')`:** se a rota não tiver `->name('eventos.show')`, o Laravel não a encontra e a view dá erro (`RouteNotFoundException`, 500).
- **Rotas com nome:** permitem mudar o endereço (por exemplo `/eventos` para `/atividades`) só num sítio, e todas as ligações com `route()` continuam a funcionar.
- **`fallback`:** apanha qualquer endereço que não corresponda a nenhuma rota. Tem de devolver o código 404 (`response()->view('errors.404', [], 404)`), senão o browser recebe 200 e trata o erro como página normal.
- **O que nunca deve ir para o GitHub:** o `.env` (passwords e `APP_KEY`), a pasta `vendor/` e a `node_modules/` (são pesadas e recriam-se com `composer install` e `npm install`).

## PL03 · Desafio: /eventos/tipo/{tipo}

Esta rota não entra em conflito com `/eventos/{id}` porque tem dois segmentos depois de `/eventos` (`tipo` e o valor), enquanto `/eventos/{id}` só corresponde a um segmento. Além disso, o `whereNumber('id')` só aceita números, por isso `/eventos/tipo` nunca seria tomado como um id.