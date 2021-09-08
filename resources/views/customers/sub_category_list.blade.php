<ul>
    @foreach($childCategories as $parent)
        <li>
            {{ $parent->category->name }}

            @include('customers.sub_category_list', [
                'childCategories' => $parent->category
            ])
        </li>
    @endforeach
</ul>
