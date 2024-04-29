<section class="pb-5">
    <h3 class="text-22 font-semibold text-gray-500 mb-2">
        Our Latest Products
        
    </h3>

    <div class="flex flex-wrap justify-between gap-3">
        @if (!empty($data['all_products']))
            @foreach($data['all_products'] as $product)
                <div class="w-[24%] bg-white hover:drop-shadow-lg">
                    <x-utility.productcard  />
                    
                </div>
            @endforeach
        @endif
            
       
    </div>
</section>