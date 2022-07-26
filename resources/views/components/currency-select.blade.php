@php
    $selected_currency = "BDT";
    if (Session::has('currency_code')){
        $selected_currency = Session::get('currency_code');
    }
@endphp
<select name="currency_changer" id="currency_changer" class="form-control">
    @foreach ($currencies as $item)
        @if ($selected_currency === $item->code)
            <option selected>{{ $item->code }}</option>
        @else                
            <option>{{ $item->code }}</option>
        @endif
    @endforeach
</select>