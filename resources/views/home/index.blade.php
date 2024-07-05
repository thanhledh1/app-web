<html>
    <header>
        abc
    </header>
    <div>
        @foreach ($sections as $section)
            @include($section->filename) 
        @endforeach
    </div>
</html>