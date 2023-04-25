<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>NEW CATEGORY:</p>
    <form action="check-category" method="POST">
        @csrf
        <input type="text" name="category_name" placeholder="Category Name"><br><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>