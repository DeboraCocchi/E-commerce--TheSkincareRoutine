<aside class="">
    <ul class="d-flex flex-column jusify-content-center align-content-center">
        <li class="text-center mb-4">
            <a class="{{Route::currentRouteName()==='admin.products.index' ? 'active' : ''}}" href="{{ route('admin.products.index') }}"><span> Prodotti</span></a>
        </li>
        <li class="text-center">
            <a class="{{Route::currentRouteName()==='profile.edit' ? 'active' : ''}}" href="{{ route('profile.edit') }}"><span> Profilo</span></a>
        </li>
    </ul>

</aside>
