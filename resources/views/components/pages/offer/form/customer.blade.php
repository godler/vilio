<div>
     @if ($form->customer)
        <div class="text-lg font-bold flex gap-3  items-center mb-3" @click.prevent="selectCustomerModal = true">
            <x-tabler-user class="w-5 h-5 text-slate-500" />
            <div class="flex-1">
                {{ $form->customer?->name }}
            </div>
            <x-tabler-dots-vertical @click.prevent="selectCustomerModal = true" 
                class="w-5 h-5 text-slate-500 cursor-pointer right-0 hover:text-slate-800"
                 />

        </div>
        @if ($form->address)
            <div class="flex gap-3">
                <x-tabler-address-book class="w-5 h-5 text-slate-500" />
                <div>
                    <div>
                        {{ $form->address->address }}
                    </div>
                    <div>
                        {{ $form->address->post_code }} {{ $form->address->city }}
                    </div>
                    @if ($form->customer->is_company)
                        <div>
                            <b>NIP:</b> {{ $form->customer->tax_number }}
                        </div>
                    @endif
                </div>
            </div>

            <div>
                <a href="mailto:{{ $form->customer?->email }}" class="flex gap-3  items-center my-3">
                    <x-tabler-mail class="w-5 h-5 text-slate-500" />{{ $form->customer?->email }}
                </a>
                <a href="tel:{{ $form->customer?->phone_number }}" class="flex gap-3  items-center">
                    <x-tabler-phone class="w-5 h-5 text-slate-500" /> {{ $form->customer?->phone_number }}
                </a>

            </div>
        @endif
    @else
        <x-ui.link @click.prevent="selectCustomerModal = true" look="outlined">
            Wybierz klienta
        </x-ui.link>
    @endif
</div>
