@if (count($errors) > 0)
    <div class="alert alert-danger alert-styled-left border-danger">
        <button type="button" class="close" data-dismiss="alert">
            <span>×</span>
            <span class="sr-only">Close</span>
        </button>
        @foreach ($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    </div>
@endif