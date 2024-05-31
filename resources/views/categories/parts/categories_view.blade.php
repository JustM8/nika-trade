@foreach($category as $cat)
    <a href="{{ route('admin.'.$type.'.index', ['category' => $cat->id]) }}"
       class="text-muted btn btn-outline-dark">
        {{ __($cat?->name[App::currentLocale()] ?? '') }}
    </a>
@endforeach
