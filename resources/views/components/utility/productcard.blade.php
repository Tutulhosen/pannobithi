

<a href="{{ route('product.show', 1) }}" class="relative bg-white   transition-all duration-500 rounded-lg">
    <div class="relative">
        <div class="block">
            <img class="w-full h-50 object-cover rounded-t-lg" src="{{ asset('dummy_image.jpg') }}" alt="product name">
        </div>
    </div>
    <div class="px-2 py-2">
        <div class="text-14 font-semibold text-slate-700">
            <div class="hover:text-slate-900">
                {{$singleProduct['title']}}

            </div>
        </div>
        <div class="text-14 font-semibold text-slate-700">
            <span>
                {{$singleProduct['price']}}
            </span>
        </div>
    </div>
</a>
