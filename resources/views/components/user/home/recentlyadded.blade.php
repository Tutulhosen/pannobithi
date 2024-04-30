<section class="pb-5">
    <h3 class="text-22 font-semibold text-gray-500 mb-2">
        Our Latest Products
        
    </h3>

    <div class="flex flex-wrap justify-between gap-3">
        
        @if (!empty($product['all_products']))
            @foreach($product['all_products'] as $single_product)
                <div class="w-[24%] bg-white hover:drop-shadow-lg">
                    {{-- <x-post id="{{ $post->id }}" title="{{ $post->title }}" /> --}}
                        <x-utility.productcard :singleProduct="$single_product"/>
                        
                        
                    
                </div>
            @endforeach
        @endif
            
       
    </div>
</section>