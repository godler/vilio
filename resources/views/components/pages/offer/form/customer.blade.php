<div>
     @if ($form->customer)
        <div class="text-lg font-bold flex gap-3  items-center mb-3" @click.prevent="selectCustomerModal = true">
            <x-tabler-user class="w-5 h-5 text-slate-500" />
            <div class="flex-1">
                {{ $form->customer?->name }}
            </div>
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
        <x-form.input wire:model="form.customer_name" label="Imię i Nazwisko/Firma"/>     
        <x-form.input wire:model="form.phone_number" label="Telefon"/>     
        <x-form.input wire:model="form.email" label="Email"/>     
        <x-form.input wire:model="form.address" label="Adress"/>     
        <div class="flex space-x-3">
            <x-form.input wire:model="form.city" label="Miejscowość" class="flex-1"/>     
            <x-form.input wire:model="form.post_code" label="Kod pocztowy" class="w-1/3"/>    
        </div>     
        <div class="flex items-center space-x-3">
            <div class="mt-5">
                <x-form.switch wire:model="form.is_company" label="Firma" attribute="form.is_company"/>  
            </div>   
            <x-form.input x-show="$wire.form.is_company" wire:model="form.tax_number" label="NIP" class="flex-1"/> 
        </div>  
    @endif
</div>
