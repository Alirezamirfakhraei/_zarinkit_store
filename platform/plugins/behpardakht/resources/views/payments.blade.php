<ul>
    @foreach($payments->payments as $payment)
        <li>
            @include('plugins/behpardakht::detail', compact('payment'))
        </li>
    @endforeach
</ul>
