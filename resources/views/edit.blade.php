<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Update Books Record</h2>
        <form action="{{ route('books.update', $book->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')

            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Name</label>
                <input type="name" name="book_name" value="{{ $book->book_name }}" class="form-control"
                    placeholder="Enter name">

                @if ($errors->has('book_name'))
                    <span class="text-danger">{{ $errors->first('book_name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="author">Author Name</label>
                <input type="text" name="author_name" value="{{ $book->author_name }}" class="form-control"
                    placeholder="Enter author">

                @if ($errors->has('author_name'))
                    <span class="text-danger">{{ $errors->first('author_name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="published">Published Date</label>
                <input type="date" name="published_date" value="{{ $book->published_date }}" class="form-control">

                {{-- @if ($errors->has('published_date'))
          <span class="text-danger">{{ $errors->first('published_date') }}</span>
      @endif --}}
            </div>
            <div class="form-group">
                <label for="image">Upload Image</label>
                <input type="file" name="image" value="{{ $book->image }}">

                @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>

</body>

</html>
