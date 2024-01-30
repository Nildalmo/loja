<x-mail::message>

# Olá, {{$user->name}}!

## Seu Pedido {{$order->id}} foi pago!

Seu pedido será enviado conforme descrito no pagamento!


<x-mail::table>
| Produto       | Preço Unitário    | Quantidade |  Total |
| ------------- |:-------------:| --------:|--------:|
@foreach ($order->products as $product)
|{{$product->name}}|R$ {{number_format($product->pivot->unit_price,2,',','.')}}|
{{$product->pivot->quantity}}|R$ {{number_format($product->pivot->total_price,2,
',','.')}}|
@endforeach

</x-mail::table>

Abraços,
Equipe My Food
</x-mail::message>
