<form action="{{ $attributes->get('action') }}" method="POST" id="card-form">
    @csrf
    <div class="form-group">
        <label for="">Name on Card</label>
        <input type="text" name="name" id="car-holder-name" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Card Details</label>
        <div id="card-element"></div>
    </div>

    {{ $slot }}


</form>

<script>
    const stripe = Stripe('{{ config('cashier.key') }}');

    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');

    const form = document.getElementById('card-form');
    const cardButton = document.getElementById('card-button');
    const cardHolderName = document.getElementById('car-holder-name');


    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        console.log('submitted');

        cardButton.disabled = true;

        const { setupIntent, error } = await stripe.confirmCardSetup(
            cardButton.dataset.secret, {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: cardHolderName.value
                    }
                }
            }
        )
        if (error) {
            cardButton.disabled = false
        } else {
            let token = document.createElement('input');
            token.setAttribute('type', 'hidden');
            token.setAttribute('name', 'token');
            token.setAttribute('value', setupIntent.payment_method);

            form.appendChild(token);
            form.submit();
        }
    });

</script>
