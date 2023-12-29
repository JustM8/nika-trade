@foreach($category as $cat)
    <a href="{{ route('admin.categories.edit', $cat->id) }}"
       class="text-muted btn btn-outline-dark">
        {{ __($cat?->name[App::currentLocale()] ?? '') }}
    </a>
@endforeach
