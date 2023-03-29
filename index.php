
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout</title>
</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-+J+Jzv6+LQvzvJ5zvZJzJvJzJv6+JzJvzvJ5zvJzJv5zvJzJv6+JzJvzvJ5zvJzJv5zvJzJv5zvJzJv5zvJzJvQ==" crossorigin="anonymous" />
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">

<body>
  <div class="flex flex-col items-center justify-start min-h-screen py-8">
    <div class="max-w-4xl w-full flex flex-col md:flex-row items-center justify-center">
      <div class="w-full md:w-1/2 mb-8 md:mb-0">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
          <img class="w-full h-64 object-cover object-center" src="./images/forex.webp" alt="Course Image">
          <div class="p-4">
            <h2 class="text-gray-900 font-bold text-2xl mb-2">Forex Course</h2>
            <p class="text-gray-700 text-base mb-4">Learn the Business of Forex Trading as an Absolute Beginner!</p>
            <p class="text-gray-700 text-base font-bold mb-2">KSH 652.41</p>
          </div>
        </div>
      </div>
      <div class="w-full md:w-1/2">
        <form class="max-w-md mx-auto" id="form" method="POST" action="mpesa.php">
         <div id="message"></div>
          <div class="mb-8 md:ml-8">
            <label class="block text-gray-700 font-bold mb-2" for="first-name">
              First Name
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="first-name" type="text" name="first-name" placeholder="First Name">
          </div>
          <div class="mb-8 md:ml-8">
            <label class="block text-gray-700 font-bold mb-2" for="last-name">
              Last Name
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="last-name" type="text" name="last-name" placeholder="Last Name">
          </div>
          <div class="mb-8 md:ml-8">
            <label class="block text-gray-700 font-bold mb-2" for="email">
              Email
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" name="email" placeholder="Email">
          </div>
          <div class="mb-8 md:ml-8">
            <label class="block text-gray-700 font-bold mb-2" for="phone">
              Phone Number
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone" type="tel" name="phone" placeholder="Phone Number">
          </div>
          <div class="flex items-center justify-start md:justify-end">
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" id="checkout-button">
              Checkout with MPESA
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
  const urlParams = new URLSearchParams(window.location.search);
  const status = urlParams.get('status');
  const message = urlParams.get('message');

  if (status && message) {
    showAlert(status, message);
  }

  function showAlert(type, message) {
    const alert = document.createElement('div');
    alert.classList.add('flex', 'items-center', 'justify-between', 'px-4', 'py-3', 'rounded', 'max-w-md', 'mx-auto', 'mb-4');

    const icon = document.createElement('i');
    icon.classList.add('mr-2', 'text-xl');

    if (type === 'success') {
      alert.classList.add('bg-green-100', 'text-green-900');
      icon.classList.add('fas', 'fa-check-circle');
    } else if (type === 'error') {
      alert.classList.add('bg-red-100', 'text-red-900');
      icon.classList.add('fas', 'fa-exclamation-circle');
    }

    alert.appendChild(icon);

    const messageText = document.createElement('span');
    messageText.textContent = message;
    alert.appendChild(messageText);

    const formContainer = document.querySelector('.max-w-4xl');
    formContainer.insertAdjacentElement('beforebegin', alert);

    setTimeout(() => {
      alert.remove();
    }, 8000);
  }

    $(document).ready(function() {
      // Wait for 20 seconds
      setTimeout(function() {
        // Get the account number from the URL
        var account_no = new URLSearchParams(window.location.search).get('account');
        // Check if the transaction record exists in the database
        $.ajax({
          url: 'check_transaction.php',
          type: 'GET',
          data: {account: account_no, status: 'success'},
          dataType: 'json',
          success: function(response) {
            // Display the response message
            $('#message').text(response.message);
          },
          error: function() {
            // Display an error message
            $('#message').text('Transaction failed!');
          }
        });
      }, 20000); // Wait for 20 seconds (20000 milliseconds)
    });

</script>

</body>

</html>