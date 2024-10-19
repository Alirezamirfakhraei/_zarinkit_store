<ul>
    @foreach($payments->payments as $payment)
        <li>
            @include('plugins/zarinpal::detail', compact('payment'))
        </li>
    @endforeach
</ul>
