    <div>

        <button wire:click="show" class=" text-white px-4 py-2 rounded">

        </button>







        <div x-data="{ open: @entangle('isVisible') }" x-show="open"
            class="fixed inset-0 bg-black bg-opacity-90  z-50 flex flex-col justify-between ">
            <div class="flex flex-col justify-start items-start ">
                <button @click="open = false" class="text-white px-4 py-2  h-32 w-32  rounded "></button>
           
            </div>
            <div class=" object-cover flex justify-center items-center">
                <div class="bubble-animation">
                    <div class="bubble"></div>
                    <div class="bubble"></div>
                    <div class="bubble"></div>
                </div>
                {{-- <img src="" alt="Protector de pantalla"
              class="w-[calc(100vw-100px)] h-[calc(100vh-100px)] "> --}}

                <style>
                    .bubble-animation .bubble{
                        width: 100px;
                        height: 100px;
                        background: rgba(255, 255, 255, 0.8);
                        border-radius: 50%;
                        position: absolute;
                        animation: float 3s infinite ease-in-out;

                    }

                    .bubble-animation .bubble:nth-child(2){
                         animation-delay: 1s;

                    }
                    .bubble-animation .bubble:nth-child(3){
                        animation-delay: 2s;
                    }

                    @keyframes float {
                        0%{transform: translateY(0);}
                        50%{transform: translateY(-300px);}
                        100%{transform: translateY(0);}
                    }
                </style>





                



            </div>
            <div class="flex flex-col justify-start items-start ">
                <button class="text-white px-4 py-2  h-0 w-32  rounded "></button>
           
            </div>
        </div>
    </div>
