<div>
    <x-slot name="header">Sales Entry</x-slot>
    <x-forms.m-panel>
        <section class="grid grid-cols-2">

            <div class="mt-3 ">

                <div class="xl:flex w-full gap-2">
                    <label for="contact_name" class="w-[10rem] text-zinc-500 tracking-wide py-2">Party Name</label>
                    <div x-data="{isTyped: @entangle('contactTyped')}" @click.away="isTyped = false" class="w-full">
                        <div class="relative ">
                            <input
                                id="contact_name"
                                type="search"
                                wire:model.live="contact_name"
                                autocomplete="off"
                                placeholder="Party Name.."
                                @focus="isTyped = true"
                                @keydown.escape.window="isTyped = false"
                                @keydown.tab.window="isTyped = false"
                                @keydown.enter.prevent="isTyped = false"
                                wire:keydown.arrow-up="decrementContact"
                                wire:keydown.arrow-down="incrementContact"
                                wire:keydown.enter="enterContact"
                                class="block w-full purple-textbox "
                            />
                            @error('contact_id')
                            <span class="text-red-500">{{'The Party Name is Required.'}}</span>
                            @enderror

                            <div x-show="isTyped"
                                 x-transition:leave="transition ease-in duration-100"
                                 x-transition:leave-start="opacity-100"
                                 x-transition:leave-end="opacity-0"
                                 x-cloak
                            >
                                <div class="absolute z-20 w-full mt-2">
                                    <div class="block py-1 shadow-md w-full
                rounded-lg border-transparent flex-1 appearance-none border
                                 bg-white text-gray-800 ring-1 ring-purple-600">
                                        <ul class="overflow-y-scroll h-96">
                                            @if($contactCollection)
                                                @forelse ($contactCollection as $i => $contact)

                                                    <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightContact === $i ? 'bg-yellow-100' : '' }}"
                                                        wire:click.prevent="setContact('{{$contact->vname}}','{{$contact->id}}')"
                                                        x-on:click="isTyped = false">
                                                        {{ $contact->vname }}
                                                    </li>

                                                @empty
                                                    <a href="{{route('contacts.upsert',['0'])}}" role="button"
                                                       class="flex items-center justify-center bg-green-500 w-full h-8 text-white text-center">
                                                        Not found , Want to create new
                                                    </a>
                                                @endforelse
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="xl:flex flex-col gap-2 pt-6">
                    <div class="xl:flex w-full gap-2">
                        <label for="order_name" class="w-[10rem] text-zinc-500 tracking-wide py-2">Order NO</label>
                        <div x-data="{isTyped: @entangle('orderTyped')}" @click.away="isTyped = false" class="w-full">
                            <div class="relative">
                                <input
                                    id="order_name"
                                    type="search"
                                    wire:model.live="order_name"
                                    autocomplete="off"
                                    placeholder="Order.."
                                    @focus="isTyped = true"
                                    @keydown.escape.window="isTyped = false"
                                    @keydown.tab.window="isTyped = false"
                                    @keydown.enter.prevent="isTyped = false"
                                    wire:keydown.arrow-up="decrementOrder"
                                    wire:keydown.arrow-down="incrementOrder"
                                    wire:keydown.enter="enterOrder"
                                    class="block w-full purple-textbox"
                                />
                                @error('order_id')
                                <span class="text-red-500">{{'The Order is Required.'}}</span>
                                @enderror

                                <div x-show="isTyped"
                                     x-transition:leave="transition ease-in duration-100"
                                     x-transition:leave-start="opacity-100"
                                     x-transition:leave-end="opacity-0"
                                     x-cloak
                                >
                                    <div class="absolute z-20 w-full mt-2">
                                        <div class="block py-1 shadow-md w-full
                rounded-lg border-transparent flex-1 appearance-none border
                                 bg-white text-gray-800 ring-1 ring-purple-600">
                                            <ul class="overflow-y-scroll h-96">
                                                @if($orderCollection)
                                                    @forelse ($orderCollection as $i => $order)
                                                        <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightOrder === $i ? 'bg-yellow-100' : '' }}"
                                                            wire:click.prevent="setOrder('{{$order->vname}}','{{$order->id}}')"
                                                            x-on:click="isTyped = false">
                                                            {{ $order->vname }}
                                                        </li>
                                                    @empty
                                                        @livewire('controls.model.order.order-model',[$order_name])
                                                    @endforelse
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="xl:flex gap-2 w-full pt-6">
                    <label for="contact_name" class="w-[10rem] text-zinc-500 tracking-wide py-2">Party Address</label>
                    <div x-data="{isTyped: @entangle('contact_detailTyped')}" @click.away="isTyped = false"
                         class="w-full">
                        <div class="relative ">
                            <input
                                id="contact_name"
                                type="search"
                                wire:model.live="contact_detail_address"
                                autocomplete="off"
                                placeholder="Party Address.."
                                @focus="isTyped = true"
                                @keydown.escape.window="isTyped = false"
                                @keydown.tab.window="isTyped = false"
                                @keydown.enter.prevent="isTyped = false"
                                wire:keydown.arrow-up="decrementContact_detail"
                                wire:keydown.arrow-down="incrementContact_detail"
                                wire:keydown.enter="enterContact_detail"
                                class="block w-full purple-textbox "
                            />
                            <div x-show="isTyped"
                                 x-transition:leave="transition ease-in duration-100"
                                 x-transition:leave-start="opacity-100"
                                 x-transition:leave-end="opacity-0"
                                 x-cloak
                            >
                                <div class="absolute z-20 w-full mt-2">
                                    <div class="block py-1 shadow-md w-full
                rounded-lg border-transparent flex-1 appearance-none border
                                 bg-white text-gray-800 ring-1 ring-purple-600">
                                        <ul class="overflow-y-scroll h-96">
                                            @if($contact_detailCollection)
                                                @forelse ($contact_detailCollection as $i => $contact_detail)
                                                    <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightContact_detail === $i ? 'bg-yellow-100' : '' }}"
                                                        wire:click.prevent="setContact_detail('{{$contact_detail->address_1}}','{{$contact_detail->id}}')"
                                                        x-on:click="isTyped = false">
                                                        {{ $contact_detail->address_1 }}
                                                    </li>

                                                @empty
                                                    <a href="{{route('contacts.upsert',[$contact_id])}}" role="button"
                                                       class="flex items-center justify-center bg-green-500 w-full h-8 text-white text-center">
                                                        Not found , Want to create new
                                                    </a>
                                                @endforelse
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="xl:flex gap-2 w-full pt-6">
                    <label for="contact_name" class="w-[10rem] text-zinc-500 tracking-wide py-2">Delivery Address</label>
                    <div x-data="{isTyped: @entangle('contact_detailTyped_1')}" @click.away="isTyped = false"
                         class="w-full">
                        <div class="relative ">
                            <input
                                id="contact_name"
                                type="search"
                                wire:model.live="contact_detail_address_1"
                                autocomplete="off"
                                placeholder="Delivery Address.."
                                @focus="isTyped = true"
                                @keydown.escape.window="isTyped = false"
                                @keydown.tab.window="isTyped = false"
                                @keydown.enter.prevent="isTyped = false"
                                wire:keydown.arrow-up="decrementContact_detail_1"
                                wire:keydown.arrow-down="incrementContact_detail_1"
                                wire:keydown.enter="enterContact_detail_1"
                                class="block w-full purple-textbox "
                            />
                            <div x-show="isTyped"
                                 x-transition:leave="transition ease-in duration-100"
                                 x-transition:leave-start="opacity-100"
                                 x-transition:leave-end="opacity-0"
                                 x-cloak
                            >
                                <div class="absolute z-20 w-full mt-2">
                                    <div class="block py-1 shadow-md w-full
                                rounded-lg border-transparent flex-1 appearance-none border
                                                 bg-white text-gray-800 ring-1 ring-purple-600">
                                        <ul class="overflow-y-scroll h-96">
                                            @if($contact_detailCollection_1)
                                                @forelse ($contact_detailCollection_1 as $i => $contact_detail_1)

                                                    <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                                        {{ $highlightContact_detail_1 === $i ? 'bg-yellow-100' : '' }}"
                                                        wire:click.prevent="setContact_detail_1('{{$contact_detail_1->address_1}}','{{$contact_detail_1->id}}')"
                                                        x-on:click="isTyped = false">
                                                        {{ $contact_detail_1->address_1 }}
                                                    </li>

                                                @empty
                                                    <a href="{{route('contacts.upsert',[$contact_id])}}" role="button"
                                                       class="flex items-center justify-center bg-green-500 w-full h-8 text-white text-center">
                                                        Not found , Want to create new
                                                    </a>
                                                @endforelse
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ml-5">

                <x-input.model-text wire:model="invoice_no" :label="'Invoice No'"/>
                <x-input.model-text wire:model="invoice_date" :label="'Invoice Date'" type="date"/>

                <x-input.model-select wire:model="sales_type" :label="'Sales Type'">
                    <option class="text-gray-400"> choose ..</option>
                    @foreach(\App\Enums\GST::cases() as $sales_type)
                        <option value="{{$sales_type->value}}">{{$sales_type->getName()}}</option>
                    @endforeach
                </x-input.model-select>
                <div class="xl:flex gap-2 w-full pt-4">
                    <label for="contact_name" class="w-[10rem] text-zinc-500 tracking-wide py-2">Style</label>
                    <div x-data="{isTyped: @entangle('styleTyped')}" @click.away="isTyped = false"
                         class="w-full">
                        <div class="relative ">
                            <input
                                id="style_name"
                                type="search"
                                wire:model.live="style_name"
                                autocomplete="off"
                                placeholder="Style Name.."
                                @focus="isTyped = true"
                                @keydown.escape.window="isTyped = false"
                                @keydown.tab.window="isTyped = false"
                                @keydown.enter.prevent="isTyped = false"
                                wire:keydown.arrow-up="decrementStyle"
                                wire:keydown.arrow-down="incrementStyle"
                                wire:keydown.enter="enterStyle"
                                class="block w-full purple-textbox"
                            />

                            <div x-show="isTyped"
                                 x-transition:leave="transition ease-in duration-100"
                                 x-transition:leave-start="opacity-100"
                                 x-transition:leave-end="opacity-0"
                                 x-cloak
                            >
                                <div class="absolute z-20 w-full mt-2">
                                    <div class="block py-1 shadow-md w-full
                rounded-lg border-transparent flex-1 appearance-none border
                                 bg-white text-gray-800 ring-1 ring-purple-600">
                                        <ul class="overflow-y-scroll h-96">
                                            @if($styleCollection)
                                                @forelse ($styleCollection as $i => $style)
                                                    <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightStyle === $i ? 'bg-yellow-100' : '' }}"
                                                        wire:click.prevent="setStyle('{{$style->vname}}','{{$style->id}}')"
                                                        x-on:click="isTyped = false">
                                                        {{ $style->vname }}
                                                    </li>
                                                @empty
                                                    @livewire('controls.model.order.style-model',[$style_name])
                                                @endforelse
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="xl:flex gap-2 w-full pt-4">
                    <label for="contact_name" class="w-[10rem] text-zinc-500 tracking-wide py-2">Despatch No</label>
                    <div x-data="{isTyped: @entangle('despatchTyped')}" @click.away="isTyped = false"
                         class="w-full">
                        <div class="relative ">
                            <input
                                id="style_name"
                                type="search"
                                wire:model.live="despatch_name"
                                autocomplete="off"
                                placeholder="Despatch No.."
                                @focus="isTyped = true"
                                @keydown.escape.window="isTyped = false"
                                @keydown.tab.window="isTyped = false"
                                @keydown.enter.prevent="isTyped = false"
                                wire:keydown.arrow-up="decrementDespatch"
                                wire:keydown.arrow-down="incrementDespatch"
                                wire:keydown.enter="enterDespatch"
                                class="block w-full purple-textbox"
                            />

                            <div x-show="isTyped"
                                 x-transition:leave="transition ease-in duration-100"
                                 x-transition:leave-start="opacity-100"
                                 x-transition:leave-end="opacity-0"
                                 x-cloak
                            >
                                <div class="absolute z-20 w-full mt-2">
                                    <div class="block py-1 shadow-md w-full
                rounded-lg border-transparent flex-1 appearance-none border
                                 bg-white text-gray-800 ring-1 ring-purple-600">
                                        <ul class="overflow-y-scroll h-96">
                                            @if($despatchCollection)
                                                @forelse ($despatchCollection as $i => $despatch)
                                                    <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightDespatch === $i ? 'bg-yellow-100' : '' }}"
                                                        wire:click.prevent="setDespatch('{{$despatch->vname}}','{{$despatch->id}}')"
                                                        x-on:click="isTyped = false">
                                                        {{ $despatch->vname }}
                                                    </li>
                                                @empty
                                                    @livewire('controls.model.common.despatch-model',[$despatch_name])
                                                @endforelse
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <x-forms.section-border/>

        <section class="text-xl font-bold text-orange-400">
            Sales Item
        </section>
        <section class="flex flex-row w-full gap-0.5">
            <div class="w-full">
                <label for="product_name"></label>
                <div x-data="{isTyped: @entangle('productTyped')}" @click.away="isTyped = false">
                    <div class="relative">
                        <input
                            id="product_name"
                            type="search"
                            wire:model.live="product_name"
                            autocomplete="off"
                            placeholder="Product Name.."
                            @focus="isTyped = true"
                            @keydown.escape.window="isTyped = false"
                            @keydown.tab.window="isTyped = false"
                            @keydown.enter.prevent="isTyped = false"
                            wire:keydown.arrow-up="decrementProduct"
                            wire:keydown.arrow-down="incrementProduct"
                            wire:keydown.enter="enterProduct"
                            class="block w-full purple-textbox-no-rounded"
                        />

                        <div x-show="isTyped"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                             x-cloak
                        >
                            <div class="absolute z-20 w-full mt-2">
                                <div class="block py-1 shadow-md w-full
                rounded-lg border-transparent flex-1 appearance-none border
                                 bg-white text-gray-800 ring-1 ring-purple-600">
                                    <ul class="overflow-y-scroll h-96">
                                        @if($productCollection)
                                            @forelse ($productCollection as $i => $product)

                                                <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightProduct === $i ? 'bg-yellow-100' : '' }}"
                                                    wire:click.prevent="setProduct('{{$product->vname}}','{{$product->id}}','{{$product->gst_percent}}')"
                                                    x-on:click="isTyped = false">
                                                    {{ $product->vname }} &nbsp;-&nbsp; GST&nbsp;:
                                                    &nbsp;{{$product->gst_percent}}%
                                                </li>

                                            @empty
                                                @livewire('controls.model.master.product-model',[$product_name])
                                            @endforelse
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <label for="qty"></label>
                <input id="qty" wire:model.live="description" class="block w-full purple-textbox-no-rounded"
                       autocomplete="false"
                       placeholder="description">
            </div>
            <div class="w-full">
                <label for="colour_name"></label>
                <div x-data="{isTyped: @entangle('colourTyped')}" @click.away="isTyped = false">
                    <div class="relative">
                        <input
                            id="colour_name"
                            type="search"
                            wire:model.live="colour_name"
                            autocomplete="off"
                            placeholder="Colour Name.."
                            @focus="isTyped = true"
                            @keydown.escape.window="isTyped = false"
                            @keydown.tab.window="isTyped = false"
                            @keydown.enter.prevent="isTyped = false"
                            wire:keydown.arrow-up="decrementColour"
                            wire:keydown.arrow-down="incrementColour"
                            wire:keydown.enter="enterColour"
                            class="block w-full purple-textbox-no-rounded"
                        />

                        <div x-show="isTyped"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                             x-cloak
                        >
                            <div class="absolute z-20 w-full mt-2">
                                <div class="block py-1 shadow-md w-full
                rounded-lg border-transparent flex-1 appearance-none border
                                 bg-white text-gray-800 ring-1 ring-purple-600">
                                    <ul class="overflow-y-scroll h-96">
                                        @if($colourCollection)
                                            @forelse ($colourCollection as $i => $colour)

                                                <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightColour === $i ? 'bg-yellow-100' : '' }}"
                                                    wire:click.prevent="setColour('{{$colour->vname}}','{{$colour->id}}')"
                                                    x-on:click="isTyped = false">
                                                    {{ $colour->vname }}
                                                </li>

                                            @empty
                                                @livewire('controls.model.common.colour-model',[$colour_name])
                                            @endforelse
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <label for="size_name"></label>
                <div x-data="{isTyped: @entangle('sizeTyped')}" @click.away="isTyped = false">
                    <div class="relative">
                        <input
                            id="size_name"
                            type="search"
                            wire:model.live="size_name"
                            autocomplete="off"
                            placeholder="Size.."
                            @focus="isTyped = true"
                            @keydown.escape.window="isTyped = false"
                            @keydown.tab.window="isTyped = false"
                            @keydown.enter.prevent="isTyped = false"
                            wire:keydown.arrow-up="decrementSize"
                            wire:keydown.arrow-down="incrementSize"
                            wire:keydown.enter="enterSize"
                            class="block w-full purple-textbox-no-rounded"
                        />

                        <div x-show="isTyped"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                             x-cloak
                        >
                            <div class="absolute z-20 w-full mt-2">
                                <div class="block py-1 shadow-md w-full
                rounded-lg border-transparent flex-1 appearance-none border
                                 bg-white text-gray-800 ring-1 ring-purple-600">
                                    <ul class="overflow-y-scroll h-96">
                                        @if($sizeCollection)
                                            @forelse ($sizeCollection as $i => $size)

                                                <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightSize === $i ? 'bg-yellow-100' : '' }}"
                                                    wire:click.prevent="setSize('{{$size->vname}}','{{$size->id}}')"
                                                    x-on:click="isTyped = false">
                                                    {{ $size->vname }}
                                                </li>

                                            @empty
                                                @livewire('controls.model.common.size-model',[$size_name])
                                            @endforelse
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <label for="qty"></label>
                <input id="qty" wire:model.live="qty" class="block w-full purple-textbox-no-rounded"
                       autocomplete="false"
                       placeholder="Qty">
            </div>
            <div class="w-full">
                <label for="price"></label>
                <input id="price" wire:model.live="price" class="block w-full purple-textbox-no-rounded"
                       autocomplete="false"
                       placeholder="price">
            </div>
            <button wire:click="addItems" class="px-3 bg-green-500 text-white font-semibold tracking-wider ">Add
            </button>
        </section>
        <section>

            <div class="py-2 mt-5">


                <table class="w-full">
                    <thead>
                    <tr class="h-8 text-xs bg-gray-100 border border-gray-300">
                        <th class="w-12 px-2 text-center border border-gray-300">#</th>
                        <th class="px-2 text-center border border-gray-300">PRODUCT</th>
                        <th class="px-2 text-center border border-gray-300">COLOUR</th>
                        <th class="px-2 text-center border border-gray-300">SIZE</th>
                        <th class="px-2 text-center border border-gray-300">QTY</th>
                        <th class="px-2 text-center border border-gray-300">PRICE</th>
                        <th class="px-2 text-center border border-gray-300">TAXABLE</th>
                        <th class="px-2 text-center border border-gray-300">GST PERCENT</th>
                        <th class="px-2 text-center border border-gray-300">GST</th>
                        <th class="px-2 text-center border border-gray-300">SUBTOTAL</th>
                        <th class="w-12 px-1 text-center border border-gray-300">ACTION</th>
                    </tr>

                    </thead>
                    <tbody>

                    @if ($itemList)

                        @foreach($itemList as $index => $row)

                            <tr class="border border-gray-400 hover:bg-amber-50">
                                <td class="text-center border border-gray-300 bg-gray-100">
                                    <button class="w-full h-full cursor-pointer"
                                            wire:click.prevent="changeItems({{$index}})">
                                        {{$index+1}}
                                    </button>
                                </td>
                                <td class="px-2 text-left border border-gray-300 cursor-pointer"
                                    wire:click.prevent="changeItems({{$index}})"><div>{{$row['product_name']}}</div><div>{{ $row['description']}}</div></td>
                                <td class="px-2 text-left border border-gray-300 cursor-pointer"
                                    wire:click.prevent="changeItems({{$index}})">{{$row['colour_name']}}</td>
                                <td class="px-2 text-left border border-gray-300 cursor-pointer"
                                    wire:click.prevent="changeItems({{$index}})">{{$row['size_name']}}</td>
                                <td class="px-2 text-center border border-gray-300 cursor-pointer"
                                    wire:click.prevent="changeItems({{$index}})">{{$row['qty']}}</td>
                                <td class="px-2 text-right border border-gray-300 cursor-pointer"
                                    wire:click.prevent="changeItems({{$index}})">{{$row['price']}}</td>
                                <td class="px-2 text-right border border-gray-300 cursor-pointer"
                                    wire:click.prevent="changeItems({{$index}})">{{$row['taxable']}}</td>
                                <td class="px-2 text-center border border-gray-300 cursor-pointer"
                                    wire:click.prevent="changeItems({{$index}})">{{$row['gst_percent']}}</td>
                                <td class="px-2 text-right border border-gray-300 cursor-pointer"
                                    wire:click.prevent="changeItems({{$index}})">{{$row['gst_amount']}}</td>
                                <td class="px-2 text-right border border-gray-300 cursor-pointer"
                                    wire:click.prevent="changeItems({{$index}})">{{$row['subtotal']}}</td>
                                <td class="text-center border border-gray-300">
                                    <button wire:click.prevent="removeItems({{$index}})"
                                            class="py-1.5 w-full text-red-500 items-center ">
                                        <x-icons.icon icon="trash" class="block w-auto h-6"/>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                    <tfoot class="mt-2">
                    <tr class="h-8 text-sm border border-gray-400 bg-cyan-50">
                        <td colspan="4" class="px-2 text-xs text-right border border-gray-300">&nbsp;TOTALS&nbsp;&nbsp;&nbsp;</td>
                        <td class="px-2 text-center border border-gray-300">{{$total_qty}}</td>
                        <td class="px-2 text-center border border-gray-300">&nbsp;</td>
                        <td class="px-2 text-right border border-gray-300">{{$total_taxable}}</td>
                        <td class="px-2 text-center border border-gray-300">&nbsp;</td>
                        <td class="px-2 text-right border border-gray-300">{{$total_gst}}</td>
                        <td class="px-2 text-right border border-gray-300">{{$grandtotalBeforeRound}}</td>
                        <td class="px-2 text-center border border-gray-300">&nbsp;</td>
                    </tr>
                    </tfoot>
                </table>

            </div>

        </section>
        <x-forms.section-border/>
        <section class="grid grid-cols-2 gap-2 ">
            <section class="w-full">
                <div class="w-3/4">

                    <div class="flex flex-col gap-2 pt-5">
                        <div class="xl:flex w-full gap-2">
                            <label for="ledger_name" class="w-[10rem] text-zinc-500 tracking-wide py-2">Ledger</label>
                            <div x-data="{isTyped: @entangle('ledgerTyped')}" @click.away="isTyped = false"
                                 class='w-full'>
                                <div class="relative">
                                    <input
                                        id="ledger_name"
                                        type="search"
                                        wire:model.live="ledger_name"
                                        autocomplete="off"
                                        placeholder="Ledger.."
                                        @focus="isTyped = true"
                                        @keydown.escape.window="isTyped = false"
                                        @keydown.tab.window="isTyped = false"
                                        @keydown.enter.prevent="isTyped = false"
                                        wire:keydown.arrow-up="decrementLedger"
                                        wire:keydown.arrow-down="incrementLedger"
                                        wire:keydown.enter="enterLedger"
                                        class="block w-full purple-textbox"
                                    />
                                    @error('ledger_id')
                                    <span class="text-red-500">{{'The Ledger is Required.'}}</span>
                                    @enderror

                                    <div x-show="isTyped"
                                         x-transition:leave="transition ease-in duration-100"
                                         x-transition:leave-start="opacity-100"
                                         x-transition:leave-end="opacity-0"
                                         x-cloak
                                    >
                                        <div class="absolute z-20 w-full mt-2">
                                            <div class="block py-1 shadow-md w-full
                rounded-lg border-transparent flex-1 appearance-none border
                                 bg-white text-gray-800 ring-1 ring-purple-600">
                                                <ul class="overflow-y-scroll h-96">
                                                    @if($ledgerCollection)
                                                        @forelse ($ledgerCollection as $i => $ledger)
                                                            <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightLedger === $i ? 'bg-yellow-100' : '' }}"
                                                                wire:click.prevent="setLedger('{{$ledger->vname}}','{{$ledger->id}}')"
                                                                x-on:click="isTyped = false">
                                                                {{ $ledger->vname }}
                                                            </li>
                                                        @empty
                                                            @livewire('controls.model.common.ledger-model',[$ledger_name])
                                                        @endforelse
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-2 pt-5">
                        <div class="xl:flex w-full gap-2">
                            <label for="transport_name"
                                   class="w-[10rem] text-zinc-500 tracking-wide py-2">Transport</label>
                            <div x-data="{isTyped: @entangle('transportTyped')}" @click.away="isTyped = false"
                                 class="w-full">
                                <div class="relative">
                                    <input
                                        id="transport_name"
                                        type="search"
                                        wire:model.live="transport_name"
                                        autocomplete="off"
                                        placeholder="Transport.."
                                        @focus="isTyped = true"
                                        @keydown.escape.window="isTyped = false"
                                        @keydown.tab.window="isTyped = false"
                                        @keydown.enter.prevent="isTyped = false"
                                        wire:keydown.arrow-up="decrementTransport"
                                        wire:keydown.arrow-down="incrementTransport"
                                        wire:keydown.enter="enterTransport"
                                        class="block w-full purple-textbox"
                                    />
                                    @error('transport_id')
                                    <span class="text-red-500">{{'The Transport is Required.'}}</span>
                                    @enderror

                                    <div x-show="isTyped"
                                         x-transition:leave="transition ease-in duration-100"
                                         x-transition:leave-start="opacity-100"
                                         x-transition:leave-end="opacity-0"
                                         x-cloak
                                    >
                                        <div class="absolute z-20 w-full mt-2">
                                            <div class="block py-1 shadow-md w-full
                rounded-lg border-transparent flex-1 appearance-none border
                                 bg-white text-gray-800 ring-1 ring-purple-600">
                                                <ul class="overflow-y-scroll h-96">
                                                    @if($transportCollection)
                                                        @forelse ($transportCollection as $i => $transport)
                                                            <li class="cursor-pointer px-3 py-1 hover:font-bold hover:bg-yellow-100 border-b border-gray-300 h-8
                                                        {{ $highlightTransport === $i ? 'bg-yellow-100' : '' }}"
                                                                wire:click.prevent="setTransport('{{$transport->vname}}','{{$transport->id}}')"
                                                                x-on:click="isTyped = false">
                                                                {{ $transport->vname }}
                                                            </li>
                                                        @empty
                                                            @livewire('controls.model.common.transport-mode',[$transport_name])
                                                        @endforelse
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <x-input.model-text wire:model="destination" :label="'Destination'"/>

                    <x-input.model-text wire:model="bundle" :label="'Bundle'"/>

                </div>
            </section>

            <section class="w-full">
                <div class="w-3/4 mr-3 ml-auto ">

                    <x-input.model-text wire:model="additional" wire:change.debounce="calculateTotal"
                                        class="text-right purple-textbox w-full ml-20" :label="'Additional'"/>


                    <div class="grid w-full grid-cols-2 pt-6">
                        <label
                            class="px-3 pb-2 text-left text-gray-600 text-md">Taxable&nbsp;Amount&nbsp;:&nbsp;&nbsp;</label>
                        <label class="px-3 pb-2 text-right text-gray-800 text-md">{{  $total_taxable }}</label>
                    </div>


                    <div class="grid w-full grid-cols-2 pt-6">
                        <label
                            class="px-3 pb-2 text-left text-gray-600 text-md">Gst&nbsp;:&nbsp;&nbsp;</label>
                        <label class="px-3 pb-2 text-right text-gray-800 text-md">{{  $total_gst }}</label>
                    </div>


                    <div class="grid w-full grid-cols-2 pt-6">
                        <label
                            class="px-3 pb-2 text-left text-gray-600 text-md">Round off&nbsp;:&nbsp;&nbsp;</label>
                        <label class="px-3 pb-2 text-right text-gray-800 text-md">{{$round_off}}</label>
                    </div>


                    <div class="grid w-full grid-cols-2 pt-6">
                        <label
                            class="px-3 pb-2 text-xl text-left text-gray-600">Grand&nbsp;Total&nbsp;:&nbsp;&nbsp;</label>
                        <label
                            class="px-3 pb-2 text-xl font-extrabold text-right text-gray-800">{{$grand_total}}</label>
                    </div>
                </div>
            </section>

        </section>
    </x-forms.m-panel>
    <x-forms.m-panel-bottom-button/>
</div>

