@extends('layouts.app')

@section('content')


    <div class=" bg-gray-100 ">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap">
                <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-1 shadow-lg rounded-lg">
                    <div class="px-4 flex-auto">
                    </div>
                    </div>
                </div>
                </div>
                <div class="flex flex-wrap items-center mt-16">
                <div class="w-full md:w-5/12 px-4 mr-auto ml-auto">
                    <div class="text-blueGray-500 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-white">
                    <i class="fas fa-user-friends text-xl"></i>
                    </div>
                    <h3 class="text-4xl mb-2 font-semibold leading-normal">
                        We Love Books
                    </h3>
                    <p class="text-xl font-light leading-relaxed mt-4 mb-4 text-blueGray-600">
                         We created audiobook because of our love of books.
                         Books educate us, entertain us, make us think, laugh, and cry.
                        They inspire creativity and motivate us. Most of all, books are who we are as people.
                    </p>
                    <p class="text-xl font-light leading-relaxed mt-4 mb-4 text-blueGray-600">
                        We believe that you should be able to enjoy your favorite book whenever, wherever, and on whatever device you choose.
                    </p>

                </div>
                <div class="w-full md:w-4/12 px-4 mr-auto ml-auto">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-2 shadow-lg rounded-lg bg-pink-500">
                    <img alt="..." src="{{ asset('storage/job.jpg') }}" class="w-full align-middle rounded-t-lg">
                    <blockquote class="relative p-8 mb-4">
                    {{-- <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 583 95" class="absolute left-0 w-full block h-95-px -top-94-px">
                                <polygon points="-30,95 583,95 583,65" class="text-pink-500 fill-current"></polygon>
                            </svg> --}}

                        <h4 class="text-xl font-bold text-white">
                        About us
                        </h4>
                        <p class="text-md font-light mt-2 text-white">
                            We are a young company always looking
                            for new and creative ideas to help you
                            with our books.
                        </p>
                    </blockquote>
                    </div>
                </div>
                </div>
            </div>

    </div>
    <div class="pt-20 pb-20">
        <div class="flex flex-wrap justify-center text-center mb-24">
                    <div class="w-full lg:w-6/12 px-4">
                      <h2 class="text-4xl font-semibold  text-blueGray-700">OUR PEOPLE</h2>

                    </div>
                  </div>
          <div class="flex flex-wrap">
            <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-8">
              <div class="px-6">
                <img alt="..." src="{{ asset('storage/tompson.jpg') }}" class=" w-32 h-32 shadow-lg rounded-full mx-auto max-w-120-px">
                <div class="pt-6 text-center">
                  <h5 class="text-xl font-bold text-blueGray-700">Ryan Tompson</h5>


                </div>
              </div>
            </div>

            <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-8">
              <div class="px-6">
                <img alt="..." src="{{ asset('storage/hadid.jpg') }}" class="shadow-lg rounded-full w-32 h-32  mx-auto max-w-120-px">
                <div class="pt-6 text-center">
                  <h5 class="text-xl font-bold text-blueGray-700">Romina Hadid</h5>


                </div>
              </div>
            </div>

            <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-8">
                <div class="px-6">
                  <img alt="..." src="{{ asset('storage/alexa.jpg') }}" class="shadow-lg rounded-full w-32 h-32 mx-auto max-w-120-px">
                  <div class="pt-6 text-center">
                    <h5 class="text-xl font-bold text-blueGray-700">Alexa Smith</h5>


                  </div>
                </div>
              </div>


            <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-8">
              <div class="px-6">
                <img alt="..." src="{{ asset('storage/jena.png') }}" class="  w-32 h-32 shadow-lg rounded-full mx-auto max-w-120-px">
                <div class="pt-6 text-center">
                  <h5 class="text-xl font-bold text-blueGray-700">Jenna Kardi</h5>


                </div>
              </div>
            </div>
          </div>
        </div>

@endsection
