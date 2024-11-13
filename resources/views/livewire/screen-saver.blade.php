<div>
    
        <button wire:click="show" class=" text-white px-4 py-2 rounded">
            
        </button>
    
        
    




    <div x-data="{ open: @entangle('isVisible') }" x-show="open"
        class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50">
<div class="bg-white rounded">
    <img src="img/calidadLogo.png" alt="Protector de pantalla"
    class=" w-[calc(100vw-100px)] h-[calc(100vh-100px)] object-cover">
    
<button @click="open = false" class="text-white px-4 py-2 bg-white h-10 rounded"></button> 

</div>
       </div>
</div>
