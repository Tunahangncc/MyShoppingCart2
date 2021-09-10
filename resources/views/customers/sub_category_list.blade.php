<li>
    <a href="{{ route('customerShowSelectedCategory', ['id' => $child_category->id]) }}">{{ $child_category->name }}</a>
</li>
@if ($child_category->categories)
    <ul class="categories-area-sub-category">
        @foreach ($child_category->categories as $childCategory)
            @include('customers.sub_category_list', ['child_category' => $childCategory])
        @endforeach
    </ul>
@endif
