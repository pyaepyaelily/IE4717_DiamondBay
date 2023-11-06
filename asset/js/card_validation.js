// console.log("Script loaded.");
// document.addEventListener("DOMContentLoaded", function () {
//     console.log("Entering input event listener for card number");

//     const paymentForm = document.getElementById("paymentForm");
//     const cardNumber = document.getElementById("cardNumber");
//     const expiryMonth = document.getElementById("expiryMonth");
//     const expiryYear = document.getElementById("expiryYear");
//     const nameOnCard = document.getElementById("nameOnCard");
//     const cvv = document.getElementById("cvv");
//     const email = document.getElementById("email");

//     // Set custom validation messages for each field
//     cardNumber.setCustomValidity("Invalid card number. Please enter a 16-digit number.");
//     expiryMonth.setCustomValidity("Invalid expiry month. Please enter a 2-digit number.");
//     expiryYear.setCustomValidity("Invalid expiry year. Please enter a 2-digit number.");
//     nameOnCard.setCustomValidity("Name should contain only letters and spaces.");
//     cvv.setCustomValidity("Invalid CVV. Please enter a 3-digit number.");
//     email.setCustomValidity("Invalid email address.");

//     // Handle form submission
//     paymentForm.addEventListener("submit", function (event) {
//         // Get the current date
//         const currentDate = new Date();
//         const currentYear = currentDate.getFullYear();
//         const currentMonth = currentDate.getMonth() + 1; // Note: Months are 0-based, so we add 1

//         // Parse the expiry date entered by the user
//         const expiryYearValue = parseInt(expiryYear.value, 10); // Parse as an integer
//         const expiryMonthValue = parseInt(expiryMonth.value, 10);

//         // Check if the card has already expired
//         if (
//             expiryYearValue < currentYear ||
//             (expiryYearValue === currentYear && expiryMonthValue < currentMonth)
//         ) {
//             expiryYear.setCustomValidity("Your card has already expired.");
//         } else if (
//             !/^[0-9]{16}$/.test(cardNumber.value) ||
//             !/^(0[1-9]|1[0-2])$/.test(expiryMonth.value) ||
//             !/^\d{2}$/.test(expiryYear.value) ||
//             !/^[A-Za-z\s]+$/.test(nameOnCard.value) ||
//             !/^\d{3}$/.test(cvv.value) ||
//             !/^\S+@\S+\.\S+$/.test(email.value)
//         ) {
//             // Display custom validation messages and prevent form submission
//             cardNumber.reportValidity();
//             expiryMonth.reportValidity();
//             expiryYear.reportValidity();
//             nameOnCard.reportValidity();
//             cvv.reportValidity();
//             email.reportValidity();
//             event.preventDefault();
//         }
//     });

//     // Handle input changes for card number
//     cardNumber.addEventListener("input", function () {
//         if (/^[0-9]{16}$/.test(cardNumber.value)) {
//             cardNumber.setCustomValidity("");
//         }
//     });

//     // Handle input changes for other fields
//     expiryMonth.addEventListener("input", function () {
//         if (/^(0[1-9]|1[0-2])$/.test(expiryMonth.value)) {
//             expiryMonth.setCustomValidity("");
//         }
//     });

//     expiryYear.addEventListener("input", function () {
//         if (/^\d{2}$/.test(expiryYear.value)) {
//             expiryYear.setCustomValidity("");
//         }
//     });

//     nameOnCard.addEventListener("input", function () {
//         if (/^[A-Za-z\s]+$/.test(nameOnCard.value)) {
//             nameOnCard.setCustomValidity("");
//         }
//     });

//     cvv.addEventListener("input", function () {
//         if (/^\d{3}$/.test(cvv.value)) {
//             cvv.setCustomValidity("");
//         }
//     });

//     email.addEventListener("input", function () {
//         if (/^\S+@\S+\.\S+$/.test(email.value)) {
//             email.setCustomValidity("");
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

    const errorCardNumber = document.getElementById("error-card-number");
    const errorExpiryMonth = document.getElementById("error-expiry-month");
    const errorExpiryYear = document.getElementById("error-expiry-year");
    const errorExpiredCard = document.getElementById("error-expired-card");
    const errorNameOnCard = document.getElementById("error-name");
    const errorCVV = document.getElementById("error-cvv");

    // Handle form submission
    paymentForm.addEventListener("submit", function (event) {
        // Reset error messages
        clearError(errorCardNumber);
        clearError(errorExpiryMonth);
        clearError(errorExpiryYear);
        clearError(errorExpiredCard);
        clearError(errorNameOnCard);
        clearError(errorCVV);

        // Check if the card number is valid
        if (!isValidCardNumber(cardNumber.value)) {
            event.preventDefault(); // Prevent form submission
            displayError(errorCardNumber, "Invalid card number. Please enter a 16-digit number.");
        }

        // Check if expiry month is valid
        if (!isValidExpiryMonth(expiryMonth.value)) {
            event.preventDefault(); // Prevent form submission
            displayError(errorExpiryMonth, "Invalid expiry month. Please enter a valid 2-digit month (01-12).");
        }

        // Check if expiry year is valid
        if (!isValidExpiryYear(expiryYear.value)) {
            event.preventDefault(); // Prevent form submission
            displayError(errorExpiryYear, "Invalid expiry year. Please enter a valid 2-digit year.");
        }

        // Check if the card has already expired
        if (hasCardExpired(expiryYear.value, expiryMonth.value)) {
            event.preventDefault(); // Prevent form submission
            displayError(errorExpiredCard, "Your card has already expired.");
        }

        if (!isValidNameOnCard(nameOnCard.value)) {
            event.preventDefault();
            displayError(errorNameOnCard, "Name should contain only letters and spaces.");
        }

        if (!isValidCVV(cvv.value)) {
            event.preventDefault();
            displayError(errorCVV, "Invalid CVV. Please enter a 3-digit number.");
        }

    });

    // Handle input changes for card number
    cardNumber.addEventListener("input", function () {
        clearError(errorCardNumber);
    });

    // Handle input changes for expiry month
    expiryMonth.addEventListener("input", function () {
        clearError(errorExpiryMonth);
    });

    // Handle input changes for expiry year
    expiryYear.addEventListener("input", function () {
        clearError(errorExpiryYear);
    });

    // ... (other input change handlers)

    function isValidCardNumber(cardNumber) {
        return /^[0-9]{16}$/.test(cardNumber);
    }

    function isValidExpiryMonth(month) {
        return /^(0[1-9]|1[0-2])$/.test(month);
    }

    function isValidExpiryYear(year) {
        return /^\d{2}$/.test(year);
    }

    function isValidNameOnCard(name) {
        return /^[A-Za-z\s]+$/.test(name);
    }
    
    function isValidCVV(cvv) {
        return /^[0-9]{3}$/.test(cvv);
    }

    function hasCardExpired(expiryYear, expiryMonth) {
        const currentDate = new Date();
        const currentYear = parseInt(currentDate.getFullYear().toString().slice(-2), 10); // Get last 2 digits of the current year
        const currentMonth = currentDate.getMonth() + 1; // Note: Months are 0-based, so add 1

        if (parseInt(expiryYear, 10) < currentYear) {
            return true; // The card has already expired
        } else if (parseInt(expiryYear, 10) === currentYear && parseInt(expiryMonth, 10) < currentMonth) {
            return true; // The card has already expired
        }

        return false; // The card is still valid
    }

    function displayError(element, message) {
        element.textContent = message;
        element.style.display = "block"; // Show the error message
    }

    function clearError(element) {
        element.textContent = "";
        element.style.display = "none"; // Hide the error message
    }
});
