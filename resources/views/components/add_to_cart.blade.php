<form action="{{ route('cart.add') }}" method="POST" id="addToCart">
    @csrf
    <input type="hidden" value="" name="item" id="cartItem">
</form>