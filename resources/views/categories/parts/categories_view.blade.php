@foreach($category as $cat)
    <a href="{{ route('admin.products.index', ['category' => $cat->id]) }}"
       class="text-muted btn btn-outline-dark">
        {{ __($cat?->name[App::currentLocale()] ?? '') }}
    </a>
@endforeach
