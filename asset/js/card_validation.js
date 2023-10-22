
    // document.addEventListener("DOMContentLoaded", function () {
    //     const paymentForm = document.getElementById("paymentForm");
    //     const cardNumber = document.getElementById("cardNumber");
    //     const errorCardNumber = document.querySelector(".error-card-number");

    //     // Add a custom validation message for the card number field
    //     cardNumber.setCustomValidity("Invalid card number. Please enter a 16-digit number.");

    //     paymentForm.addEventListener("submit", function (event) {
    //         // Check if the card number is valid
    //         if (!/^[0-9]{16}$/.test(cardNumber.value)) {
    //             cardNumber.reportValidity(); // Display the custom validation message
    //             event.preventDefault(); // Prevent form submission
    //         }
    //     });

    //     cardNumber.addEventListener("input", function() {
    //         // Check card number and reset the custom validation message
    //         if (/^[0-9]{16}$/.test(cardNumber.value)) {
    //             cardNumber.setCustomValidity(""); // Clear the custom error message
    //         }
    //     });
    // });



    document.addEventListener("DOMContentLoaded", function () {
        const paymentForm = document.getElementById("paymentForm");
        const cardNumber = document.getElementById("cardNumber");
        const expiryMonth = document.getElementById("expiryMonth");
        const expiryYear = document.getElementById("expiryYear");
        const nameOnCard = document.getElementById("nameOnCard");
        const cvv = document.getElementById("cvv");
        const email = document.getElementById("email");

        // Set custom validation messages for each field
        cardNumber.setCustomValidity("Invalid card number. Please enter a 16-digit number.");
        expiryMonth.setCustomValidity("Invalid expiry month. Please enter a 2-digit number.");
        expiryYear.setCustomValidity("Invalid expiry year.");
        nameOnCard.setCustomValidity("Name should contain only letters and spaces.");
        cvv.setCustomValidity("Invalid CVV. Please enter a 3-digit number.");
        email.setCustomValidity("Invalid email address.");

        // Handle form submission
        paymentForm.addEventListener("submit", function (event) {
            // Check if each field is valid
            if (!/^[0-9]{16}$/.test(cardNumber.value) ||
                !/^(0[1-9]|1[0-2])$/.test(expiryMonth.value) ||
                !/^(20)\d{2}$/.test(expiryYear.value) ||
                !/^[A-Za-z\s]+$/.test(nameOnCard.value) ||
                !/^\d{3}$/.test(cvv.value) ||
                !/^\S+@\S+\.\S+$/.test(email.value)) {
                // Display custom validation messages and prevent form submission
                cardNumber.reportValidity();
                expiryMonth.reportValidity();
                expiryYear.reportValidity();
                nameOnCard.reportValidity();
                cvv.reportValidity();
                email.reportValidity();
                event.preventDefault();
            }
        });

        // Handle input changes for card number
        cardNumber.addEventListener("input", function() {
            if (/^[0-9]{16}$/.test(cardNumber.value)) {
                cardNumber.setCustomValidity("");
            }
        });

        // Handle input changes for other fields
        expiryMonth.addEventListener("input", function() {
            if (/^(0[1-9]|1[0-2])$/.test(expiryMonth.value)) {
                expiryMonth.setCustomValidity("");
            }
        });

        expiryYear.addEventListener("input", function() {
            if (/^(20)\d{2}$/.test(expiryYear.value)) {
                expiryYear.setCustomValidity("");
            }
        });

        nameOnCard.addEventListener("input", function() {
            if (/^[A-Za-z\s]+$/.test(nameOnCard.value)) {
                nameOnCard.setCustomValidity("");
            }
        });

        cvv.addEventListener("input", function() {
            if (/^\d{3}$/.test(cvv.value)) {
                cvv.setCustomValidity("");
            }
        });

        email.addEventListener("input", function() {
            if (/^\S+@\S+\.\S+$/.test(email.value)) {
                email.setCustomValidity("");
            }
        });
    });




