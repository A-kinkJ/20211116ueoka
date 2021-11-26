<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TODOリスト</title>
  <style>
    body {
      background-color: #2d197c;
      height: 100vh;
      width: 100vw;
      position: relative;
      text-align: center;
    }

    .to-do-list {

      background-color: #fff;
      width: 50vw;
      margin: auto;
      margin-top: 50px;
      margin-bottom: 30px;
      padding: 30px;

      /*position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);*/
      border-radius: 10px;
    }

    .to-do-list h1 {
      font-size: 25px;
      margin-bottom: 10px;
    }

    .to-do-list-content {
      width: 100%;
    }

    .to-do-txt-content {
      width: 75%;
      border-radius: 3px;
      border: 1px solid #ccc;
      font-size: 18px;
      margin-right: 10%;
    }

    .create-button {
      text-align: left;
      border: 2px solid #dc70fa;
      font-size: 12px;
      color: #dc70fa;
      background-color: #fff;
      font-weight: bold;
      padding: 6px 14px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.4s;
      outline: none;
    }

    .add-button:hover {
      background-color: #dc70fa;
      border-color: #dc70fa;
      color: #fff;
    }

    th {
      padding-top: 15px;
      padding-bottom: 15px;
    }

    table {
      text-align: center;
      width: 100%;
      justify-content: space-between;
    }

    tr {
      height: 10px;
    }

    .add-txt {
      width: 90%;
      border-radius: 3px;
      border: 1px solid #ccc;
      padding: 3px;
      font-size: 14px;
    }

    .update-button {
      text-align: left;
      border: 2px solid #fa9770;
      font-size: 12px;
      color: #fa9770;
      background-color: #fff;
      font-weight: bold;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.4s;
      outline: none;
    }

    .update-button:hover {
      background-color: #fa9770;
      border-color: #fa9770;
      color: #fff;
    }

    .delete-button {
      text-align: left;
      border: 2px solid #71fadc;
      font-size: 12px;
      color: #71fadc;
      background-color: #fff;
      font-weight: bold;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.4s;
      outline: none;
    }

    .delete-button:hover {
      background-color: #71fadc;
      border-color: #71fadc;
      color: #fff;
    }
  </style>
</head>

<body>
  <div class="to-do-list">
    <div class="to-do-list-ttl">
      <h1>Todo List</h1>
    </div>

    <div class="to-do-list-main">
      <table>
        <tr>
          <div class="to-do-list-txt">
            <form action="/todo/create" method="POST">
              @csrf
              <td>
                <input class="to-do-txt-content" type="text" name="content">
              </td>
              <td>
                <input class="create-button" type="submit" value="追加">
              </td>
            </form>
          </div>
        </tr>
      </table>
      <table>
        <div class="table-ttl">
          <tr>
            <th>作成日</th>
            <th>タスク名</th>
            <th>更新</th>
            <th>削除</th>
          </tr>
        </div>
        @foreach($todos as $todo)
        <tr>
          <td>{{$todo->updated_at}}</td>
          <td>
            <form action="/todo/update" method="POST">
              @csrf
              <input class="add-txt" type="text" class="input-update" name="content" value="{{$todo->content}}">
          </td>
          <td>
            <input type="hidden" value="{{$todo->id}}" name="id">
            <input class="update-button" type="submit" value="更新">
            </form>
          </td>
          <td>
            <form action="/todo/delete" method="POST">
              @csrf
              <input type="hidden" value="{{$todo->id}}" name="id">
              <input class="delete-button" type="submit" value="削除">
            </form>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</body>

</html>