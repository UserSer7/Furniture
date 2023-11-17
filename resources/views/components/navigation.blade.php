{{-- Navigation Bar --}}
<nav class="flex flex-row p-5 justify-center items-center bg-white z-10 sticky top-0">
    <a href="#" class="fixed top-0 left-[11px] right-0">
        <img src="{{ asset('assets/images/logo.png') }}" class="w-fit h-[80px]">
    </a>
    <ul class="flex flex-row gap-14 justify-center ">
        <li><a href="#">Home</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Shop</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">
            </a></li>
    </ul>
    <div class="justify-end">
        <a href="{{route('login')}}" class=" fixed top-4 left-[1211px] right-0 bg-blue-900 px-8 py-4 w-20 h-6 flex justify-center items-center rounded-md hover:bg-blue-950 hover:scale-125 mr-9 mb-19">
            <h1 class="absolute text-white justify-center">Login</h1>
        </a>
    </div>
</nav>
