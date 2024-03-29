<x-user.layout>
    <section class="bg-white min-h-screen p-2 m-2 flex gap-4">
        <div class="w-[30%] ">
            <img class="w-full h-80 object-cover border border-blue-500 mb-5" src="{{ asset('dummy_image.jpg') }}" alt="Product">
            
        </div>
        <div class="w-[70%] flex flex-col gap-4">
            <h3 class="text-xl">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Non ipsum neque, saepe, blanditiis quos iusto molestiae fuga architecto eum explicabo nam corrupti reprehenderit! Velit ipsum commodi deleniti nostrum illum dolores!</h3>
            <p class="text-3xl text-orange-500">&#2547; 1000</p>
            <div class="flex items-center gap-2 text-14">
                <p class=" text-gray-500 line-through">&#2547; 1000</p>
                <p>-73%</p>
            </div>
            <div class="flex items-center gap-4">
                <p class="text-14 text-gray-500">Quantity</p>
                <div class="flex items-center gap-4">
                    <button class="bg-gray-200 text-gray-500 hover:bg-gray-500 hover:text-gray-200 p-2 rounded transition-all duration-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M432 256c0 17.7-14.3 32-32 32L48 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l352 0c17.7 0 32 14.3 32 32z"/></svg>
                    </button>
                    <span>1</span>
                    <button class="bg-gray-200 text-gray-500 hover:bg-gray-500 hover:text-gray-200 p-2 rounded transition-all duration-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                    </button>
                </div>
            </div>
            <div class="flex gap-4">
                <a href="#" class="bg-sky-400 hover:bg-sky-500 text-white font-bold py-2 px-4 rounded">
                    Buy Now
                </a>
                <a href="#" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">
                    Add to Cart
                </a>
            </div>
        </div>
    </section>
</x-user.layout>