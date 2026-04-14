function isUserLoggedIn() {
    return document.body.getAttribute('data-logged-in') === 'true';
}

function openLoginForm() {
    document.getElementById('loginModal').style.display = 'block';
}

function closeLoginForm() {
    document.getElementById('loginModal').style.display = 'none';
}

document.addEventListener('DOMContentLoaded', function () {
    const bookNowBtn = document.getElementById('bookNowBtn');
    const bookingModal = document.getElementById('bookingModal');
    const nameInput = document.getElementById('bookingName');
    const emailInput = document.getElementById('bookingEmail');

    bookNowBtn.addEventListener('click', function () {
        if (isUserLoggedIn()) {
            nameInput.value = document.body.getAttribute('data-username');
            emailInput.value = document.body.getAttribute('data-email');
            bookingModal.style.display = 'block';
        } else {
            openLoginForm();
        }
    });

    document.getElementById('loginForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch('login.php', {
            method: 'POST',
            body: formData
        }).then(res => res.text()).then(response => {
            if (response.trim() === 'success') {
                location.reload(); // After login, reload to update session and reopen booking
            } else {
                document.getElementById('loginError').innerText = response;
            }
        });
    });
});
