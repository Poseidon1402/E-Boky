<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Save book</title>
    @vite('ressources/css/app.css')
</head>
<body>
    <form action={{ route('book_save') }} method="post" enctype="multipart/form-data">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title" id="title">

        <label for="description">Description</label>
        <input type="text" name="description" id="description">

        <label for="price">Price</label>
        <input type="text" name="price" id="price">

        <label for="page">Page Number</label>
        <input type="text" name="page" id="page">

        <label for="book">Upload your book</label>
        <input type="file" name="book" id="book">

        <label for="category">Category</label>
        <select name="category" id="category">
            @foreach ($categories as $category)
                <option value={{ $category->wording }}>{{ $category->wording }}</option>
            @endforeach
        </select>

        <label for="language">Language</label>
        <select name="language" id="language">
            @foreach ($languages as $language)
                <option value={{ $language->name }}>{{ $language->name }}</option>
            @endforeach
        </select>

        <button type="submit">Save</button>
    </form>
</body>
</html>