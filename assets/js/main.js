document
  .getElementById("whatsappForm")
  .addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent form submission

    var destination = document.getElementById("destination").value;
    var Checkin = document.getElementById("checkin").value;
    var Checkout = document.getElementById("checkout").value;
    var Members = document.getElementById("members").value;

    // Perform form validation
    if (!destination || !Checkin || !Checkout || !Members) {
      alert("Please fill in all fields");
      return;
    }

    // Generate WhatsApp link
    var whatsappLink = `https://wa.me/+917889869644?text=Greetings!!
    We will need a package for %20${destination}.
    Checkin date would be on %20${Checkin}
    and Checkout date would be %20${Checkout}.
    We are %20${Members} members in total. Thank you.`;
    window.open(whatsappLink);
  });
