<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
</head>
<body>
    <h2>Pay for Appointment #{{ $appointment->id }}</h2>
    <button id="pay-button">Pay Now</button>

    <form action="{{ url('payment/callback') }}" method="POST" id="submit_form">
        @csrf
        <input type="hidden" name="order_id" id="order_id">
        <input type="hidden" name="status_code" id="status_code">
        <input type="hidden" name="gross_amount" id="gross_amount">
        <input type="hidden" name="signature_key" id="signature_key">
    </form>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result){
                    sendResponseToForm(result);
                },
                onPending: function(result){
                    sendResponseToForm(result);
                },
                onError: function(result){
                    console.log(result);
                },
                onClose: function(){
                    console.log('customer closed the popup without finishing the payment');
                }
            });
        });

        function sendResponseToForm(result){
            document.getElementById('order_id').value = result.order_id;
            document.getElementById('status_code').value = result.status_code;
            document.getElementById('gross_amount').value = result.gross_amount;
            document.getElementById('signature_key').value = result.signature_key;
            document.getElementById('submit_form').submit();
            window.location.href = '{{ route("appointments.indexUser") }}';
        }
    </script>
</body>
</html>
