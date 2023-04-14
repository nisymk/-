<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>バドミントン交流アプリ</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>

    </style>
</head>

<body>
    <div class="container">
        <div class="col-md-6 col-xs-6 follow line" align="center">
            <h3>
                バドミントン交流アプリ <br /> <span>FOLLOWERS</span>
            </h3>
        </div>
        <div class="col-md-6 col-xs-6 follow line" align="center">
            <div align="center">
                <button class="btn btn-orange">新規登録</button>
            </div>
        </div>
    </div>
    <div class="container" align="center">
        <div th:if="${validationError}" th:each="error : ${validationError}">
            <label class="text-danger" th:text="${error}"></label>
        </div>
        <h1>パスワード再登録</h1>
        <form th:action="@{/user/create}" th:object="${userRequest}" th:method="post">
            <div class="form-group">
                <label>氏名：<span class="text-danger">※</span></label>
                <input type="text" th:field="*{name}" class="form-control">
            </div>
            <div class="form-group">
                <label>パスワード：</label>
                <input type="text" th:field="*{password}" class="form-control">
            </div>
            <div class="form-group">
                <label>パスワードの確認：<span class="text-danger">※</span></label>
                <input type="text" th:field="*{password}" class="form-control">
            </div>
            <br />
            <div class="text-center">
                <a href="" class="btn btn-secondary">キャンセル</a>
                <input type="submit" value="　登録　" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>

</html>