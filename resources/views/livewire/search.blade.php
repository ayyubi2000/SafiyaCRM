<div>
     <div class="main-header-center ml-md-3 d-sm-none d-md-none d-lg-block">
        <input wire:model="searchText" wire:keydown.enter="search"
               class="form-control" placeholder="Karta raqam..." type="text"/>
         <button class="btn">
             <i class="fas fa-search d-none d-md-block" wire:click="search"></i>
         </button>
    </div>
</div>
