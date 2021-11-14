<!-- navbar goes here  -->


<nav class="bg-white ">
  <div class="max-w-6xl mx-auto  ">
    <div class="flex justify-between">
            <!--logo-->
            <div>
              <a href="{{ url('/') }}" class="flex  items-center py-4  text-gray-500 hover:text-gray-900">
                  <svg class="h-8 w-8 mr-1 text-green-400" 
                  xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                  </svg>
                  <span class="font-bold">Audio Book</span>
                  </a>
            </div>

          <div class="flex space-x-1 ">
                    <!-- primary nav -->
              <div class=" hidden md:flex items-center space-x-1">
              
                  <a href="{{ url('/') }}" class="py-5 px-3 text-gray-700 hover:text-gray-900">{{ __('Home') }}</a>
                  <a href="#" class="py-5 px-3 text-gray-700 hover:text-gray-900">About</a>

                  @if((Auth::user() && Auth::user()->role==2))
                  <a href="#" class="py-5 px-3 text-gray-700 hover:text-gray-900">My Books</a>
                  @endif

                  @if((Auth::user() &&Auth::user()->role==1))
                  <a href="/user" class="py-5 px-3 text-gray-700 hover:text-gray-900">Users</a>
                  <a href="/book" class="py-5 px-3 text-gray-700 hover:text-gray-900">Books</a>
                  @endif
              </div>
              @guest
                   <!-- secondary nav -->
                 <div class=" hidden md:flex items-center space-x-1">
                    <a class="py-5 px-3 text-gray-700 hover:text-gray-900" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a class="py-2 px-3 text-gray-700 bg-green-400 hover:bg-green-200 rounded transition duration-300" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
               @else
                    <p class=" hidden md:flex py-6 px-3 text-gray-700 hover:text-gray-900">{{ Auth::user()->name }}</p>
                     <a href="{{ route('logout') }}"
                       class="hidden md:flex py-6 px-3 text-gray-700 hover:text-gray-900"
                       onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                  </div>
              @endguest
              
        
          </div>

                   <!--Mobile buttons goes here-->

        <div class="md:hidden  items-center flex justify-between inline-flex  px-3  ">
          <button class="mobile-menu-button focus:outline-none  ">
              <svg class="w-6 h-6 "
               xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
          </button>
        </div>

      </div>
  </div>

          <!-- mobile menu -->
      <div class="mobile-menu hidden md:hidden text-center ">
                <a href="{{ url('/') }}" class="block py-2 px-4 text-m hover:bg-gray-200">{{ __('Home') }}</a>
                <a href="#" class="block py-2 px-4 text-m hover:bg-gray-200">About</a>
               @if((Auth::user() &&Auth::user()->role==1))
                <a href="/book" class="block py-2 px-4 text-m hover:bg-gray-200">Books</a>
                <a href="/user" class="block py-2 px-4 text-m hover:bg-gray-200">Users</a>
               @endif
               @if((Auth::user() && Auth::user()->role==2))
                 <a href="#" class="block py-2 px-4 text-m hover:bg-gray-200">My Books</a>
               @endif

                  
          @guest
              <a class="block py-2 px-4 text-m hover:bg-gray-200" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
              <a class="block py-2 px-4 text-m bg-green-400 hover:bg-green-200 rounded transition duration-300" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
              @else
               
              <span class="block py-2 px-4 text-m hover:bg-gray-200">{{ Auth::user()->name }}</span>
              <a href="{{ route('logout') }}"
                  class=" block py-2 py-3 px-4 text-gray-700 hover:text-gray-900 hover:bg-gray-200"
                  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
              </form>
                
          @endguest
            
      </div>
  
    </nav>

   <script>
        //grab everything we need
        const btn =document.querySelector('button.mobile-menu-button');
        const menu =document.querySelector('.mobile-menu');
        //add event liteners
        btn.addEventListener('click', ()=>{
          menu.classList.toggle('hidden');
        });
        
    </script>   