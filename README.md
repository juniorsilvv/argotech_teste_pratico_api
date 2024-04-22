
# Teste prático Argo Tech Backend

Nesse repositório contém a parte do backend para o teste prático.

Uma API para o aplicativo de ToDo List.




## Documentação da API

#### Retorna todas as tarefas cadastradas

```http
  GET /api/all
```

#### Cadastra uma tarefa

```http
  POST /api/create
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `title`      | `string` | **Obrigatório**.|
| `description` | `string` | **Obrigatório**|


#### Atualiza uma tarefa
```http
  POST /api/update/{id}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id` | `int` | **Obrigatório**. ID do item que deseja alterar |
| `title`      | `string` | **Obrigatório**.|
| `description` | `string` | **Obrigatório**|

#### Atualiza o status da tarefa
```http
  POST /api/update/status/{id}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `status` | `int` | **Obrigatório**. Só é permitido valores 0 ou 1, Caso valor passdo seja diferente irá definir como 0 por padrão |

#### Apaga uma tarefa
```http
  POST /api/delete/{id}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id` | `int` | **Obrigatório**. ID do item que deseja deletar |



