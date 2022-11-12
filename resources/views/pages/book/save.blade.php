<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Save book</title>
    @vite('resources/css/app.css')
</head>
<body>

    <div class="grid grid-rows-4 gap-4">
        <form action={{ route('book_save') }} method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-flow-col gap-2 w-2/4 mb-4">
                <div class="grid grid-flow-row">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title">
                    @error('title')
                        <div class="text-red-700">{{ $message }}</div>
                    @enderror
                </div>

                <div class="grid grid-flow-row">
                    <label for="price">Price</label>
                    <input type="text" name="price" id="price">
                    @error('price')
                        <div class="text-red-700">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="grid grid-flow-col gap-3 w-2/4 mb-4">
                <div class="grid grid-flow-row">
                    <label for="author">Author</label>
                    <input type="text" name="author" id="author">
                </div>

                <div class="grid grid-flow-row">
                    <label for="book">Upload your book</label>
                    <input type="file" name="book" id="book">
                    @error('book')
                        <div class="text-red-700">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="grid grid-flow-col gap-2 w-2/4 mb-4">
                <div class="grid grid-flow-row">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-select">
                        @foreach ($categories as $category)
                            <option value={{ $category->wording }}>{{ $category->wording }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="grid grid-flow-row">
                    <label for="language">Language</label>
                    <select name="language" id="language">
                        @foreach ($languages as $language)
                            <option value={{ $language->name }}>{{ $language->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="grid grid-flow-row w-2/4 mb-4">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="20" rows="3" style="resize: none"></textarea>
                @error('description')
                    <div class="text-red-700">{{ $message }}</div>
                @enderror
            </div>
    
            <button type="submit" class="bg-slate-700 w-2/4 hover:bg-slate-800 text-white font-bold py-2 px-4 rounded">
                Save
            </button>
        </form>

    </div>
</body>
</html>