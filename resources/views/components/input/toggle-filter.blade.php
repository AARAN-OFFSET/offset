@props([
'showFilters'=>false
])
<button wire:click="toggleShowFilters"
        class="md:w-3 mb-20 mt-2 ml-1.5 md:pt-2">
    <x-icons.icon :icon="$showFilters ? 'cog':'adjustments'" class="h-6 w-auto block"/>
</button>
