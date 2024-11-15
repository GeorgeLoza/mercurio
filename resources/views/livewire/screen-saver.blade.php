<div>
    
        <button wire:click="show" class=" text-white px-4 py-2 rounded">
            
        </button>
    
        
    




    <div x-data="{ open: @entangle('isVisible') }" x-show="open"
        class="fixed inset-0 bg-black bg-opacity-90  z-50 flex justify-center items-center">
<div class=" object-cover">
    {{-- <img src="" alt="Protector de pantalla"
    class="w-[calc(100vw-100px)] h-[calc(100vh-100px)] "> --}}





    
    
<button @click="open = false" class="text-white px-4 py-2  h-32 w-32  rounded"></button> 



</div>
       </div>
</div>
