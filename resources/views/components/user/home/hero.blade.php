<section class="flex gap-4 pt-5 pb-7">
    <div class="w-[20%]">
        <ul class="flex flex-col space-y-2 p-3 bg-white rounded">
            @foreach ($hero['category'] as $cat)
                <li class="uppercase cursor-pointer hover:bg-slate-100 group transition-all duration-500">
                    <div class="dropdown dropdown-hover dropdown-right w-full">
                        <div tabindex="0" class="m-1 mr-3 text-gray-500 group-hover:text-primary flex items-center gap-1 transition-all duration-500 text-14">
                            <span>
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M112 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm40 304V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V256.9L59.4 304.5c-9.1 15.1-28.8 20-43.9 10.9s-20-28.8-10.9-43.9l58.3-97c17.4-28.9 48.6-46.6 82.3-46.6h29.7c33.7 0 64.9 17.7 82.3 46.6l58.3 97c9.1 15.1 4.2 34.8-10.9 43.9s-34.8 4.2-43.9-10.9L232 256.9V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V352H152z"/></svg>
                            </span>
                            <span>
                                {{$cat->name}}
                            </span>
                        </div>
                        <ul tabindex="0" class="dropdown-content z-10 menu p-2 shadow bg-white rounded-box w-52">
                            @php
                                $sub_category=DB::table('subcategory')->where('category_id', $cat->id)->get();
                            @endphp
                            @foreach ($sub_category as $sub_cat)
                            <li class="uppercase cursor-pointer hover:bg-slate-100 text-gray-500 hover:text-primary  transition-all duration-500 text-14"><a href="{{route('category.men', 1)}}">{{$sub_cat->name}}</a></li>
                            @endforeach
                            
                            
                        </ul>
                    </div>
                </li>
            @endforeach
            
           
            
        </ul>
    </div>
    <div class="w-[80%] ">
        <x-user.home.slider :slider="$hero['slider']" />
    </div>
</section>
{{-- <div class="flex justify-center pb-5">
    <a href="#" class="w-[85%]">
        <img src="{{ asset('home_sale_banner.jpg') }}" class="w-full h-48 rounded-t-badge rounded-b-lg" alt="Sale Banner">
    </a>
</div> --}}