<section class="bg-blue-500 sticky top-0 z-50">
    <div class="container mx-auto px-2 lg:px-12 flex flex-col space-y-2">
        <div class="flex justify-between">
            <div class="flex gap-4 text-14 font-medium text-white capitalize p-1">
                <a href="#" class="hover:text-slate-200">Become a Seller</a>
                <a href="#" class="hover:text-slate-200">Ponnobithi Donates</a>
                <a href="#" class="hover:text-slate-200">Help & Support</a>
            </div>
            <a href="#" class="text-14 font-semibold text-white hover:text-slate-200 capitalize inline-flex items-center gap-2 bg-slate-800 p-1 rounded-b-lg">
                <span>
                    <img class="w-6 rounded-full" src="{{ asset('logo.jpg') }}" alt="Ponno Bithi">
                </span>
                <span>
                    Save more on app
                </span>
            </a>
        </div>
        <div class="flex items-center pb-3 space-x-4">
            <a href="{{ route('home') }}" class="w-[12%]">
                <img class="w-36 h-10 rounded-full" src="{{ asset('logo.jpg') }}" alt="Ponno Bithi">
            </a>
            <div class="w-[64%]">
                <form action="#" class="bg-white p-1 w-full flex rounded-lg">
                    <input type="text" placeholder="Search in PonnoBithi" class="w-full p-1 focus:outline-none focus:ring-0 text-14 placeholder:text-gray-500">
                    <button class="bg-primary/30 px-3 py-1 rounded-lg">
                        <svg class="fill-primary w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
                    </button>
                </form>
            </div>
            <div class="flex items-center justify-end w-[24%]">
                <div class="flex items-center gap-2">
                    <a href="#" class="inline-flex items-center gap-1 text-white text-14 font-bold hover:bg-blue-600 p-2 rounded-lg">
                        <span>
                            <svg class="fill-current w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/></svg>
                        </span>
                        <span>
                            Login
                        </span>
                    </a>
                    <div class="w-[1px] h-3 bg-white"></div>
                    <a href="#" class="text-white text-14 font-bold hover:bg-blue-600 p-2 rounded-lg">
                        Sign Up
                    </a>
                </div>
                <div class="flex items-center gap-2">
                    <form action="#" class="hover:bg-blue-600 group p-2 rounded-lg">
                        <select name="lang" id="lang" class="bg-primary group-hover:bg-blue-600 w-10 text-white font-semibold cursor-pointer">
                            <option value="en">
                                EN
                            </option>
                            <option value="ban">
                                বাংলা
                            </option>
                        </select>
                    </form>
                    <a href="#" class="hover:bg-blue-600 p-2 rounded-lg">
                        <svg class="fill-white w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>