@extends('layouts.frontoffice')

@section('title', 'Home')

@push('styles')
    <link href="{{ asset('css/checkout.css') }}" rel="stylesheet">
@endpush
@section('extra-js')
    <script src="https://js.stripe.com/v3/"></script>

@endsection

@section('content')
    <div class="flex justify-center items-cente h-fit ">
        <div class="flex flex-col md:flex-row h-fit min-h-screen w-11/12">
            <div class="flex-1 flex flex-col justify-center items-center prose max-w-none">
                <h2>Mode de paiement </h2>
                <br>
                <!-- Display a payment form -->
                <form id="payment-form" class="py-4">
                    <div id="link-authentication-element">
                        <!--Stripe.js injects the Link Authentication Element-->
                    </div>
                    <div id="payment-element">
                        <!--Stripe.js injects the Payment Element-->
                    </div>
                    <button id="submit">
                        <div class="spinner hidden" id="spinner"></div>
                        <span id="button-text">Payer maintenant</span>
                    </button>
                    <div id="payment-message" class="hidden"></div>
                </form>
            </div>
            <div class="flex-1 bg-slate-100 px-10">
                <div class="mt-8 flow-root">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    {{-- main data --}}
                                    @foreach (Cart::content() as $cart_item)
                                        <tr class="cart-item-row" data-quantity="{{ $cart_item->qty }}"
                                            data-row-id="{{ $cart_item->rowId }}">
                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                                <div class="flex gap-10 items-center">
                                                    <div class="w-56">
                                                        <div class="relative" style="height: 150px; width: 150px;">
                                                            <img class="m-0" style="height: 150px; width; 150px"
                                                                src="{{ asset('images/scranchies/' . $cart_item->options['top_view']) }}"
                                                                alt="">
                                                            <span
                                                                class="absolute top-0 right-0 px-2 py-1 bg-[#03524C] text-white text-xs font-bold rounded">{{ $cart_item->qty }}</span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="text-2xl font-bold text-[#03524C]">
                                                            {{ $cart_item->model->name }}
                                                            <span data-id="{{ $cart_item->id }}"
                                                                class="product_id hidden"></span>
                                                        </p>
                                                        <br>
                                                        <span>
                                                            <span data-price=""
                                                                id="{{ 'product_' . $cart_item->id . '_price' }}">
                                                                {{ $cart_item->price }}</span>
                                                            €
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td
                                                class="whitespace-nowrap py-4 px-3 text-lg font-bold text-black align-middle">
                                            </td>
                                            <td class="whitespace-nowrap py-4 px-3 text-lg align-middle">
                                                <div class="flex gap-8 text-center">
                                                </div>
                                            </td>
                                            <td
                                                class="whitespace-nowrap py-4 px-3 text-lg font-bold text-black align-middle text-end">
                                                <span data-subtotal="" id="{{ 'product_' . $cart_item->id . '_total' }}"
                                                    class="sub_total_price">
                                                    {{ $cart_item->price * $cart_item->qty }}</span> €
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{-- bottom --}}
                                    <tr>
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                        </td>
                                        <td class="whitespace-nowrap py-4 px-3 text-lg font-bold text-black align-middle">
                                        </td>
                                        <td class="whitespace-nowrap py-4 px-3 text-lg align-middle"></td>
                                        <td class="whitespace-nowrap py-4 px-3 text-sml align-middle text-xl">
                                            <span class="text-black font-bold">
                                                Montont total :
                                            </span>
                                            <span data-total="" class="text-black font-bold underline">
                                                <span id="total_price"> {{ Cart::total() }} </span>
                                                €</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- <script src="{{ asset('js/checkout.js') }}"></script> --}}
    <script>
        // This is your test publishable API key.
        const stripe = Stripe('{{ env(key: 'PK_STRIPE') }}');
        // The items the customer wants to buy
        const items = [{
            id: "xl-tshirt"
        }];

        let elements;

        initialize();
        checkStatus();

        document
            .querySelector("#payment-form")
            .addEventListener("submit", handleSubmit);
        let emailAddress = "";
        // Fetches a payment intent and captures the client secret
        async function initialize() {
            const {
                clientSecret
            } = await fetch(
                "{{ route('order.do-pay') . '?total=' . Cart::total() }}", {
                    method: "GET",
                }
            ).then((r) => r.json());
            elements = stripe.elements({
                clientSecret
            });
            const linkAuthenticationElement = elements.create("linkAuthentication");
            linkAuthenticationElement.mount("#link-authentication-element");
            const paymentElementOptions = {
                layout: "tabs",
            };
            const paymentElement = elements.create("payment", paymentElementOptions);
            paymentElement.mount("#payment-element");
        }

        async function handleSubmit(e) {
            e.preventDefault();
            setLoading(true);
            const {
                error
            } = await stripe.confirmPayment({
                elements,
                confirmParams: {
                    // Make sure to change this to your payment completion page
                    return_url: "{{ route('order.payment.success') }}",
                    receipt_email: emailAddress,
                },
            });
            // This point will only be reached if there is an immediate error when
            // confirming the payment. Otherwise, your customer will be redirected to
            // your `return_url`. For some payment methods like iDEAL, your customer will
            // be redirected to an intermediate site first to authorize the payment, then
            // redirected to the `return_url`.
            if (error.type === "card_error" || error.type === "validation_error") {
                showMessage(error.message);
            } else {
                showMessage("An unexpected error occurred.");
            }
            setLoading(false);
        }

        // Fetches the payment intent status after payment submission
        async function checkStatus() {
            const clientSecret = new URLSearchParams(window.location.search).get(
                "payment_intent_client_secret"
            );
            if (!clientSecret) {
                return;
            }
            const {
                paymentIntent
            } = await stripe.retrievePaymentIntent(clientSecret);
            switch (paymentIntent.status) {
                case "succeeded":
                    showMessage("Payment succeeded!");
                    break;
                case "processing":
                    showMessage("Your payment is processing.");
                    break;
                case "requires_payment_method":
                    showMessage("Your payment was not successful, please try again.");
                    break;
                default:
                    showMessage("Something went wrong.");
                    break;
            }
        }
        // ------- UI helpers -------
        function showMessage(messageText) {
            const messageContainer = document.querySelector("#payment-message");
            messageContainer.classList.remove("hidden");
            messageContainer.textContent = messageText;
            setTimeout(function() {
                messageContainer.classList.add("hidden");
                messageText.textContent = "";
            }, 4000);
        }
        // Show a spinner on payment submission
        function setLoading(isLoading) {
            if (isLoading) {
                // Disable the button and show a spinner
                document.querySelector("#submit").disabled = true;
                document.querySelector("#spinner").classList.remove("hidden");
                document.querySelector("#button-text").classList.add("hidden");
            } else {
                document.querySelector("#submit").disabled = false;
                document.querySelector("#spinner").classList.add("hidden");
                document.querySelector("#button-text").classList.remove("hidden");
            }
        }
    </script>
@endsection
