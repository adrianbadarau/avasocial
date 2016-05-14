@if (session('status'))
    <div class="alert alert-success alert-styled-left border-success">
        <button type="button" class="close" data-dismiss="alert">
            <span>×</span>
            <span class="sr-only">Close</span>
        </button>
        {{ session('status') }}</ul>
    </div>
@endif